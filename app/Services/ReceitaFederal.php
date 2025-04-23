<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\ReceitaFederal\PessoaJuridica;
use App\Models\ReceitaFederal\Cnae;
use App\Models\ReceitaFederal\Qsa;

class ReceitaFederal
{
    public function saveCompany($company)
    {
        // $company = (object) null;
        // $company->cnpj = "17.280.127/0001-04";
        // $company->data_situacao = "06/11/2014";
        // $company->atividade_principal = [
        //     (object) [
        //         'text' => 'aaaaa',
        //         'code' => "62.09-1-00",
        //     ],
        // ];
        // $company->atividades_secundarias = [
        //     (object) [
        //         'text' => 'bbbb',
        //         'code' => "61.90-6-01",
        //     ],
        //     (object) [
        //         'text' => 'cccc',
        //         'code' => "61.90-6-02",
        //     ],
        //     (object) [
        //         'text' => 'cccc',
        //         'code' => "61.90-6-03",
        //     ],
        // ];
        // $company->qsa = [
        //     (object) [
        //         'qual' => '37-Sócio Pessoa Jurídica Domiciliado no Exterior',
        //         'nome' => "MOTORES DIESEL ANDINOS S.A.",
        //         'pais_origem' => "PERU",
        //         'nome_rep_legal' => "LEONIDAS PAGOTO LEITE",
        //         'qual_rep_legal' => "17-Procurador",
        //     ],
        //     (object) [
        //         'qual' => '37-Sócio Pessoa Jurídica Domiciliado no Exterior',
        //         'nome' => "MOTORES DIESEL ANDINOS S.A.",
        //     ],
        //     (object) [
        //         'qual' => '37-Sócio Pessoa Jurídica Domiciliado no Exterior',
        //         'nome' => "MOTORES DIESEL ANDINOS S.A.",
        //     ],
        // ];

        // dd($company);

        if (env('RF_SAVE_COMPANY', false)) {
            try {
                $pj = $this->savePj($company);
                $this->saveAtividadesPrincipais($pj, $company);
                $this->saveAtividadesSecundarias($pj, $company);
                $this->saveQsa($pj, $company);

                return $pj;
            } catch (\Exception $th) {
                Log::error($th->getMessage());
            }
        }
    }

    private function savePj($company)
    {
        $pj = PessoaJuridica::where('cnpj', $company->cnpj)->first();

        if (is_null($pj)) {
            $pj = new PessoaJuridica;
        }

        $pj->fill(collect($company)->toArray());
        $pj->save();

        return $pj;
    }

    private function saveAtividadesPrincipais($pj, $company)
    {
        $ids = [];

        foreach ($company->atividade_principal as $atividade_principal) {
            $cnae = Cnae::where('cod_subclasse', $this->formatCnae($atividade_principal->code))->first();
            if ($cnae) {
                array_push($ids, $cnae->id);
            }
        }

        $pivotData = array_fill(0, count($ids), ['tipo_atividade' => 'principal']);
        $syncData  = array_combine($ids, $pivotData);
        $pj->atividades_principais()->sync($syncData);
    }

    private function saveAtividadesSecundarias($pj, $company)
    {
        $ids = [];

        foreach ($company->atividades_secundarias as $atividade_secundaria) {
            $cnae = Cnae::where('cod_subclasse', $this->formatCnae($atividade_secundaria->code))->first();
            if ($cnae) {
                array_push($ids, $cnae->id);
            }
        }

        $pivotData = array_fill(0, count($ids), ['tipo_atividade' => 'secundaria']);
        $syncData  = array_combine($ids, $pivotData);
        $pj->atividades_secundarias()->sync($syncData);
    }

    private function saveQsa($pj, $company)
    {
        $pj->qsa()->delete();

        foreach ($company->qsa as $item) {
            $qsa = new Qsa;
            $qsa->fill((array) $item);
            $pj->qsa()->save($qsa);
        }
    }

    private function formatCnae($string)
    {
        return vsprintf("%s%s%s%s-%s/%s%s", str_split(preg_replace('/\D/', '', $string)));
    }
}
