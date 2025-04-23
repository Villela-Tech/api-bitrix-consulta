<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_map', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->string('cnpj_field', 100);
            $table->string('atividade_principal', 100);
            $table->string('data_situacao', 100);
            $table->string('atividades_secundarias', 100);
            $table->string('qsa', 100);
            $table->string('situacao', 100);
            $table->string('porte', 100);
            $table->string('abertura', 100);
            $table->string('natureza_juridica', 100);
            $table->string('fantasia', 100);
            $table->string('ultima_atualizacao', 100);
            $table->string('status', 100);
            $table->string('tipo', 100);
            $table->string('complemento', 100);
            $table->string('efr', 100);
            $table->string('motivo_situacao', 100);
            $table->string('situacao_especial', 100);
            $table->string('data_situacao_especial', 100);
            $table->string('capital_social', 100);
            $table->string('usar_mascara_cnpj', 100);
            $table->string('atividades_secundarias_codigo', 100);
            $table->string('atividade_principal_codigo', 100);
            $table->string('token_rws', 100);
            $table->string('campos_adiconais', 500)->nullable();
            $table->string('usar_controll_cnpj', 100);
            $table->nullableTimestamps(0);
        });

        Schema::table('fields_map', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields_map');
    }
}
