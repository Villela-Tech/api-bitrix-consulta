<div class="form-group">
  <label>CNPJ</label>
  <div class="input-group mb-3">
    <input id="cnpj-input" type="text" class="form-control" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" onclick="searchCNPJ()"><?php echo trans('messages.search') ?></button>
    </div>
  </div>
  <small class="form-text text-muted"><?php echo trans('messages.cnpj_search_info') ?></small>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success" id="success" style="display:none;"><?php echo trans('messages.company_created') ?></div>
  </div>
  <div class="col-md-6">
    <div class="d-flex justify-content-center">
      <div class="spinner-grow" role="status" style="display:none;" id="loading_receita">
        <span class="sr-only"><?php echo trans('messages.loading') ?></span>
      </div>
    </div>
    <div id="alert-receita" class="alert alert-warning" style="display:none;"></div>
    <div class="card" id="company-receita" style="display:none;">
      <div class="card-body">
        <h5 class="card-title"><?php echo trans('messages.rf.title') ?></h5>
        <button id="btn-register" class="btn btn-primary" style="display: none" data-toggle="modal" data-target="#confirmModal">
          <?php echo trans('messages.bitrix_company_save') ?>
          <i class="fas fa-arrow-right"></i>
        </button>

        <label><?php echo trans('messages.rf.name') ?></label>
        <input class="form-control form-control-sm" id="company-name" disabled>

        <label><?php echo trans('messages.rf.fantasy_name') ?></label>
        <input class="form-control form-control-sm" id="company-fantasia" disabled>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.phone') ?></label>
            <input class="form-control form-control-sm" id="company-phone" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.email') ?></label>
            <input class="form-control form-control-sm" id="company-email" disabled>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.city') ?></label>
            <input class="form-control form-control-sm" id="company-city" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.district') ?></label>
            <input class="form-control form-control-sm" id="company-district" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.uf') ?></label>
            <input class="form-control form-control-sm" id="company-uf" disabled>
          </div>
        </div>
        <label><?php echo trans('messages.rf.street') ?></label>
        <input class="form-control form-control-sm" id="company-lagradouro" disabled>
        <label><?php echo trans('messages.rf.additional') ?></label>
        <input class="form-control form-control-sm" id="company-complemento" disabled>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.number') ?></label>
            <input class="form-control form-control-sm" id="company-numero" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.cep') ?></label>
            <input class="form-control form-control-sm" id="company-cep" disabled>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.main_activities') ?>:</label>
            <div class="form-row" id="company_atividades_principais">
              <?php echo trans('messages.loading') ?>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.side_activities') ?>:</label>
            <div class="form-row" id="company_atividades_secundarias">
              <?php echo trans('messages.loading') ?>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.qsa') ?></label>
            <div class="form-row" id="company_qsa">
              <?php echo trans('messages.loading') ?>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.status') ?></label>
            <input class="form-control form-control-sm" id="company-situacao" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.status_date') ?></label>
            <input class="form-control form-control-sm" id="company-data_situacao" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.status_reason') ?></label>
            <input class="form-control form-control-sm" id="company-motivo_situacao" disabled>
          </div>
        </div>
        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.company_size') ?></label>
            <input class="form-control form-control-sm" id="company-porte" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.company_type') ?></label>
            <input class="form-control form-control-sm" id="company-tipo" disabled>
          </div>
        </div>


        <label><?php echo trans('messages.rf.legal_nature') ?></label>
        <input class="form-control form-control-sm" id="company-natureza_juridica" disabled>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.opened_since') ?></label>
            <input class="form-control form-control-sm" id="company-abertura" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.last_update') ?></label>
            <input class="form-control form-control-sm" id="company-ultima_atualizacao" disabled>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <label><?php echo trans('messages.rf.special_situation') ?></label>
            <input class="form-control form-control-sm" id="company-situacao_especial" disabled>
          </div>
          <div class="col">
            <label><?php echo trans('messages.rf.special_situation_date') ?></label>
            <input class="form-control form-control-sm" id="company-data_situacao_especial" disabled>
          </div>
        </div>

        <label><?php echo trans('messages.rf.efr') ?></label>
        <input class="form-control form-control-sm" id="company-efr" disabled>

        <label><?php echo trans('messages.rf.share_capital') ?></label>
        <input class="form-control form-control-sm" id="company-capital_social" disabled>

        <!--
								<button onclick="load_details()" style="margin-top:10px" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#details">
								informações detalhadas
								</button>
								-->
      </div>

    </div>
  </div>
  <div class="col-md-6">
    <div class="d-flex justify-content-center">
      <div class="spinner-grow" role="status" style="display:none;" id="loading_bitrix">
        <span class="sr-only"><?php echo trans('messages.loading') ?></span>
      </div>
    </div>
    <div id="alert-bitrix" class="alert alert-warning" style="display:none;"></div>
    <div class="card" id="company-bitrix" style="display:none;">
      <div class="card-body">
        <h5 class="card-title"><?php echo trans('messages.bitrix.title') ?></h5>
        <label>ID</label>
        <input class="form-control form-control-sm" id="bitrix_id" disabled>
        <label><?php echo trans('messages.bitrix.name') ?></label>
        <input class="form-control form-control-sm" id="bitrix_title" disabled>
        <label><?php echo trans('messages.bitrix.responsible') ?></label>
        <input class="form-control form-control-sm" id="bitrix_assigned_by" disabled>
        <div id="campos_adicionais">

        </div>
        <button style="margin-top:10px" class="btn btn-primary btn-sm" onclick="redirect_crm()">
          <?php echo trans('messages.bitrix.btn_redirect_to_crm') ?>
        </button>

        <button id="btn-update" class="btn btn-primary float-right btn-sm" style="margin-top:10px;" data-toggle="modal" data-target="#atualizarModal">
          <?php echo trans('messages.bitrix.btn_update') ?>
        </button>

      </div>
    </div>
  </div>
</div>

<script>
  const fields_map = @json($fields_map);

  auth_user = @json(app('auth')->user());

  var bitrix_company = null;
  var profile = null;

  BX24.callMethod('profile', {}, function(res) {
    profile = res.data();
  });

  async function searchCNPJ() {

    //checkRequiredFields();
    var CNPJ = document.getElementById("cnpj-input").value;
    CNPJ = getCNPJOnlyNumbers(CNPJ);
    if (!CNPJ) {
      return ({
        error: trans('validation.cnpj_required')
      });
    }
    document.getElementById("company-bitrix").style.display = "none";
    document.getElementById("company-receita").style.display = "none";

    document.getElementById("alert-bitrix").style.display = "none";
    document.getElementById("alert-receita").style.display = "none";

    document.getElementById("success").style.display = "none";

    document.getElementById("loading_receita").style.display = "block";
    document.getElementById("loading_bitrix").style.display = "block";

    document.getElementById("btn-register").style.display = "none";
    document.getElementById("btn-update").style.display = "none";

    try {
      let responseReceita = await searchCNPJinReceitaWs();
      await fillCompanyForm(responseReceita);
      document.getElementById("btn-update").style.display = "block";
    } catch (e) {
      // console.log(e);
      document.getElementById("alert-receita").style.display = "block";
      document.getElementById("alert-receita").textContent = e.error;
    }

    try {
      let responseBitrix = await searchCNPJinBitrix();
      bitrix_company = responseBitrix;

      //   if (responseBitrix.length > 0) {
      //     document.getElementById("btn-register").style.display = "none";
      //   }
    } catch (e) {
      // console.log(e);
      document.getElementById("alert-bitrix").style.display = "block";
      document.getElementById("alert-bitrix").textContent = e.error;
    }


    document.getElementById("loading_receita").style.display = "none";
    document.getElementById("loading_bitrix").style.display = "none";
    BX24.fitWindow(); //Ajusta tamanho do iframe no bitrix
  }

  function searchCNPJinReceitaWs() {

    return new Promise((resolve, reject) => {

      var CNPJ = document.getElementById("cnpj-input").value;

      CNPJ = getCNPJOnlyNumbers(CNPJ);

      if (!CNPJ) {
        reject({
          error: "CNPJ vazio!"
        });
      }

      let url = "{{ route('rf.get_company') }}" + "?cnpj=" + CNPJ;

      fetch(url, {
          method: 'GET',
          headers: {
            "Authorization": getAuthorization(),
          },
        })
        .then(response => {

          if (response.status !== 200) {
            // console.log(response.staus);
            response.json().then((data) => {
              reject({
                error: data
              });
            });
          } else {
            response.json().then((data) => {
              if (data.status == "ERROR") {
                reject({
                  error: data.message
                });
              } else {
                resolve(data);
              }
            }).catch((error) => {
              reject({
                error: trans('validation.public_api_limit_reach')
              });
            });
          }
        })
        .catch((erro) => {
          // console.log(erro);
          reject(erro);
        });
    })
  }

  function searchCNPJinBitrix() {

    return new Promise((resolve, reject) => {

      var CNPJ = document.getElementById("cnpj-input").value;

      if (!fields_map) {
        reject({
          error: trans('validation.cnpj_required_1')
        });
        return;
      }

      //   if (fields_map.usar_mascara_cnpj && fields_map.usar_mascara_cnpj == 'false') {
      //     CNPJ = getCNPJOnlyNumbers(CNPJ);
      //   }

      if (fields_map.cnpj_field == '-1') {
        reject({
          error: trans('validation.cnpj_required_1')
        });
        return;
      }
      if (!CNPJ) {
        reject({
          error: trans('validation.cnpj_required')
        });
        return;
      }

      let url = "{{ route('bitrix.get_company') }}" + "?cnpj=" + CNPJ;

      fetch(url, {
          method: 'GET',
          headers: {
            "Authorization": getAuthorization(),
          },
        })
        .then(response => {
          if (response.status !== 200) {

            response.json().then((data) => {
              reject({
                error: data.error
              });
            });

          } else {
            response.json().then(async (data) => {

              if (data.result.length > 0) {
                document.getElementById("company-bitrix").style.display = "block";
                document.getElementById("bitrix_title").value = data.result[0].TITLE;
                document.getElementById("bitrix_id").value = data.result[0].ID;
                document.getElementById("bitrix_assigned_by").value = data.result[0].ASSIGNED_BY_NAME;

                // let exibir_campos_adicionais = document.getElementById("campos_adiconais").value;
                // //  console.log(exibir_campos_adicionais);
                // if (exibir_campos_adicionais && exibir_campos_adicionais !== "") {
                //   let camposAdicionais = exibir_campos_adicionais.split(',');

                //   let camposAdicionaisHtml = camposAdicionais.map((c) => {
                //     if (!c) return;
                //     let f = company_fields[c];
                //     let label = f.formLabel ? f.formLabel : f.title;
                //     let value = data.result[0][c];

                //     if (f.type === "enumeration") {
                //       let v = f.items.filter((i) => {
                //         return i.ID == value
                //       });
                //       value = v.length > 0 ? v[0].VALUE : "";
                //     }

                //     return `<label>${label}</label>
                // 										<input class="form-control form-control-sm" value="${value}" disabled>`;
                //   });
                //   document.getElementById("campos_adicionais").innerHTML = camposAdicionaisHtml.join(' ');

                // }

                //document.getElementById("bitrix_assigned_by").value = data.result[0].ASSIGNED_BY_ID;
                // let user = await getUser(data.result[0].ASSIGNED_BY_ID);
                // if (user.length > 0) user = user[0];
                // let name = user.NAME + " " + user.LAST_NAME;
                // document.getElementById("bitrix_assigned_by").value = name;
                // let profile = await getProfile();
                // //  await notify(data.result[0].ASSIGNED_BY_ID, `Ola ${name} o usuário ${profile.NAME+" "+profile.LAST_NAME} consultou a empresa ${data.result[0].TITLE} que esta sobre sua responsabilidade em ${new Date().toLocaleString()}`);
                // await notify(data.result[0].ASSIGNED_BY_ID, `Hello ${name}! User ${profile.NAME+" "+profile.LAST_NAME} consulted company ${data.result[0].TITLE} that's under your responsability. ${new Date().toLocaleString()}`);
                resolve(data.result);
              } else {

                document.getElementById("btn-register").style.display = "block";

                reject({
                  error: trans('validation.cnpj_not_found')
                });
              }
            });
          }
        })
        .catch((erro) => {
          // console.log(erro);
          reject({
            error: erro
          });
        });
    })
  }

  function getCNPJOnlyNumbers(CNPJ) {
    var aux = "";
    for (var i = 0; i < CNPJ.length; i++) {
      if (CNPJ[i] !== '.' && CNPJ[i] !== '-' && CNPJ[i] !== '/') {
        aux += CNPJ[i];
      }
    }
    return aux;
  }

  /* Preenche as informações da busca na api no formulario de exibição da empresa no lado esquerdo */
  function fillCompanyForm(data) {
    return new Promise((resolve, reject) => {
      company_in_receita = data;
      document.getElementById("company-receita").style.display = "block";
      document.getElementById("company-name").value = data.nome;
      document.getElementById("company-fantasia").value = data.fantasia;
      document.getElementById("company-phone").value = data.telefone;
      document.getElementById("company-email").value = data.email;
      document.getElementById("company-uf").value = data.uf;
      document.getElementById("company-city").value = data.municipio;
      document.getElementById("company-district").value = data.bairro;
      document.getElementById("company-situacao").value = data.situacao;
      document.getElementById("company-data_situacao").value = data.data_situacao;
      document.getElementById("company-lagradouro").value = data.logradouro;
      document.getElementById("company-complemento").value = data.complemento;
      document.getElementById("company-numero").value = data.numero;
      document.getElementById("company-cep").value = data.cep;
      document.getElementById("company-natureza_juridica").value = data.natureza_juridica;
      document.getElementById("company-porte").value = data.porte;
      document.getElementById("company-abertura").value = data.abertura;
      document.getElementById("company-ultima_atualizacao").value = new Date(data.ultima_atualizacao).toLocaleString();
      document.getElementById("company-tipo").value = data.tipo;
      document.getElementById("company-motivo_situacao").value = data.motivo_situacao;
      document.getElementById("company-situacao_especial").value = data.situacao_especial;
      document.getElementById("company-data_situacao_especial").value = data.data_situacao_especial;
      document.getElementById("company-efr").value = data.efr;
      document.getElementById("company-capital_social").value = data.capital_social.toLocaleString("pt-BR", {
        minimumFractionDigits: 2,
        style: 'currency',
        currency: 'BRL'
      });
      //Inserindo atividades principais:
      let htmlAtividadesPrincipais = data.atividade_principal.map((a) => {
        return (`
					<div class="col-md-2">
						<input class="form-control form-control-sm" id="atividade_p_codigo[]" value="${a.code}" disabled>
					</div>
					<div class="col-md-10">
						<input class="form-control form-control-sm" id="atividade_p_descricao[]" value="${a.text}" disabled>
					</div>
			 `);
      });
      document.getElementById('company_atividades_principais').innerHTML = htmlAtividadesPrincipais.join(" ");
      //Inserindo atividades secundarias:
      let htmlAtividadesSecundarias = data.atividades_secundarias.map((a) => {
        return (`
					<div class="col-md-2">
						<input class="form-control form-control-sm" id="atividade_p_codigo[]" value="${a.code}" disabled>
					</div>
					<div class="col-md-10">
						<input class="form-control form-control-sm" id="atividade_p_descricao[]" value="${a.text}" disabled>
					</div>
			 `);
      });
      document.getElementById('company_atividades_secundarias').innerHTML = htmlAtividadesSecundarias.join(" ");

      //Inserindo qsa
      let htmlQsa = data.qsa.map((q) => {
        return (`
					<div class="col-md-4">
						<input class="form-control form-control-sm" id="qsa_qual[]" value="${q.qual}" disabled>
					</div>
					<div class="col-md-8">
						<input class="form-control form-control-sm" id="qsa_nome[]" value="${q.nome}" disabled>
					</div>
			 `);
      });
      document.getElementById('company_qsa').innerHTML = htmlQsa.join(" ");

      if (typeof data.qsa === 'undefined' || data.qsa == null || data.qsa.length == 0) {
        $('#company_qsa').parent().parent().hide();
      }

      resolve();
    });
  }

  function registerCompanyOnBitrix() {

    return new Promise(async (resolve, reject) => {

      document.getElementById('btn-register').disabled = true;

      //campos padroes não configuraveis
      let body = {
        fields: {
          TITLE: company_in_receita.nome,
          //UF_CRM_1553277492: company_in_receita.cnpj,
          ADDRESS: company_in_receita.logradouro,
          ADDRESS_CITY: company_in_receita.municipio,
          ADDRESS_POSTAL_CODE: company_in_receita.cep,
          ADDRESS_REGION: company_in_receita.bairro,
          ADDRESS_PROVINCE: company_in_receita.uf,
          PHONE: [{
            VALUE: company_in_receita.telefone,
            TYPE: "WORK"
          }],
          EMAIL: [{
            VALUE: company_in_receita.email,
            TYPE: "WORK"
          }],
        }
      }

      if (!fields_map) {
        reject(trans('validation.cnpj_required_1'));
        alert(trans('validation.cnpj_required_1'));
        return;
      }

      //campos personalizados
      if (fields_map.cnpj_field == '-1') {
        reject(trans('validation.cnpj_required_1'));
        alert(trans('validation.cnpj_required_1'));
        return;
      }
      let cnpj_receita = company_in_receita.cnpj;
      if (fields_map.usar_mascara_cnpj && fields_map.usar_mascara_cnpj == 'false') {
        cnpj_receita = getCNPJOnlyNumbers(cnpj_receita);
      }

      body.fields[fields_map.cnpj_field] = cnpj_receita;
      body.fields[fields_map.atividade_principal] = company_in_receita.atividade_principal.map((atv) => {
        return atv.text
      });
      body.fields[fields_map.data_situacao] = company_in_receita.data_situacao;
      body.fields[fields_map.atividades_secundarias] = company_in_receita.atividades_secundarias.map((atv) => {
        return atv.text
      });
      body.fields[fields_map.qsa] = company_in_receita.qsa.map((qsa) => {
        return qsa.nome
      });
      body.fields[fields_map.situacao] = company_in_receita.situacao;
      body.fields[fields_map.porte] = company_in_receita.porte;
      body.fields[fields_map.abertura] = company_in_receita.abertura;
      body.fields[fields_map.natureza_juridica] = company_in_receita.natureza_juridica;
      body.fields[fields_map.fantasia] = company_in_receita.fantasia;
      body.fields[fields_map.ultima_atualizacao] = company_in_receita.ultima_atualizacao;
      body.fields[fields_map.status] = company_in_receita.status;
      body.fields[fields_map.tipo] = company_in_receita.tipo;
      body.fields[fields_map.complemento] = company_in_receita.complemento;
      body.fields[fields_map.efr] = company_in_receita.efr;
      body.fields[fields_map.motivo_situacao] = company_in_receita.motivo_situacao;
      body.fields[fields_map.situacao_especial] = company_in_receita.situacao_especial;
      body.fields[fields_map.data_situacao_especial] = company_in_receita.data_situacao_especial;
      body.fields[fields_map.capital_social] = company_in_receita.capital_social;

      body.fields[fields_map.atividades_secundarias_codigo] = company_in_receita.atividades_secundarias.map((atv) => {
        return atv.code
      });
      body.fields[fields_map.atividade_principal_codigo] = company_in_receita.atividade_principal.map((atv) => {
        return atv.code
      });

      delete(body.fields["-1"]);

      BX24.callMethod(
        "crm.company.add", body,
        function(result) {
          if (result.error()) {
            reject(result.error());
            document.getElementById('btn-register').disabled = false;
          } else {
            document.getElementById('btn-register').disabled = false;
            document.getElementById('btn-register').style.display = "none";
            document.getElementById("success").style.display = "block";
            resolve(result.data());
          }
        }
      );

      // let url = "{{ route('bitrix.create_company') }}";

      // const rawResponse = await fetch(url, {
      //   method: 'POST',
      //   headers: {
      //     'Accept': 'application/json',
      //     'Content-Type': 'application/json',
      //     'Authorization': getAuthorization(),
      //   },
      //   body: JSON.stringify(body)
      // });
      // const content = await rawResponse.json();
      // if (content.result) {
      //   document.getElementById("success").style.display = "block";
      //   // console.log(content);
      //   resolve(content);
      // } else {
      //   alert(content.error_description);
      //   reject(content.error_description);

      // }

    })
  }

  function updateCompanyOnBitrix() {

    return new Promise(async (resolve, reject) => {

      company_id = document.getElementById('bitrix_id').value

      //campos padroes não configuraveis
      let body = {
        id: company_id,
        fields: {
          TITLE: company_in_receita.nome,
          ADDRESS: company_in_receita.logradouro,
          ADDRESS_CITY: company_in_receita.municipio,
          ADDRESS_POSTAL_CODE: company_in_receita.cep,
          ADDRESS_REGION: company_in_receita.bairro,
          ADDRESS_PROVINCE: company_in_receita.uf,
          PHONE: [{
            VALUE: company_in_receita.telefone,
            TYPE: "WORK"
          }],
          EMAIL: [{
            VALUE: company_in_receita.email,
            TYPE: "WORK"
          }],
        }
      }
      //campos personalizados
      if (fields_map.cnpj_field == '-1') {
        reject(trans('validation.cnpj_required_1'));
        alert(trans('validation.cnpj_required_1'));
        return;
      }

      let cnpj_receita = company_in_receita.cnpj;
      if (fields_map.usar_mascara_cnpj && fields_map.usar_mascara_cnpj == 'false') {
        cnpj_receita = getCNPJOnlyNumbers(cnpj_receita);
      }

      body.fields[fields_map.cnpj_field] = cnpj_receita;
      body.fields[fields_map.atividade_principal] = company_in_receita.atividade_principal.map((atv) => {
        return atv.text
      });
      body.fields[fields_map.data_situacao] = company_in_receita.data_situacao;
      body.fields[fields_map.atividades_secundarias] = company_in_receita.atividades_secundarias.map((atv) => {
        return atv.text
      });
      body.fields[fields_map.qsa] = company_in_receita.qsa.map((qsa) => {
        return qsa.nome
      });
      body.fields[fields_map.situacao] = company_in_receita.situacao;
      body.fields[fields_map.porte] = company_in_receita.porte;
      body.fields[fields_map.abertura] = company_in_receita.abertura;
      body.fields[fields_map.natureza_juridica] = company_in_receita.natureza_juridica;
      body.fields[fields_map.fantasia] = company_in_receita.fantasia;
      body.fields[fields_map.ultima_atualizacao] = company_in_receita.ultima_atualizacao;
      body.fields[fields_map.status] = company_in_receita.status;
      body.fields[fields_map.tipo] = company_in_receita.tipo;
      body.fields[fields_map.complemento] = company_in_receita.complemento;
      body.fields[fields_map.efr] = company_in_receita.efr;
      body.fields[fields_map.motivo_situacao] = company_in_receita.motivo_situacao;
      body.fields[fields_map.situacao_especial] = company_in_receita.situacao_especial;
      body.fields[fields_map.data_situacao_especial] = company_in_receita.data_situacao_especial;
      body.fields[fields_map.capital_social] = company_in_receita.capital_social;

      body.fields[fields_map.atividades_secundarias_codigo] = company_in_receita.atividades_secundarias.map((atv) => {
        return atv.code
      });
      body.fields[fields_map.atividade_principal_codigo] = company_in_receita.atividade_principal.map((atv) => {
        return atv.code
      });


      delete(body.fields["-1"]);

      BX24.callMethod(
        "crm.company.update", body,
        function(result) {
          if (result.error()) {
            reject(result.error());
          } else {
            document.getElementById("success").style.display = "block";

            if (bitrix_company[0]['ASSIGNED_BY_ID'] != profile.ID) {

              if (auth_user.lang == 'br') {
                var message = `(CNPJ) O usuário ${profile.NAME+" "+profile.LAST_NAME} consultou e atualizou a empresa ${body.fields.TITLE} que esta sob sua responsabilidade. [${new Date().toLocaleString()}]`;
              } else {
                var message = `(CNPJ) User ${profile.NAME+" "+profile.LAST_NAME} consulted and updated ${body.fields.TITLE} company that's under your responsibility. [${new Date().toLocaleString()}]`;
              }

              BX24.callMethod(
                "im.notify", {
                  to: bitrix_company[0]['ASSIGNED_BY_ID'],
                  message: message
                }
              );
            }

            resolve(result.data());
          }
        }
      );

      // let url = "{{ url('bitrix/company') }}";
      // url += `/${company_id}`;

      // const rawResponse = await fetch(url, {
      //   method: 'PUT',
      //   headers: {
      //     'Accept': 'application/json',
      //     'Content-Type': 'application/json',
      //     'Authorization': getAuthorization(),
      //   },
      //   body: JSON.stringify(body)
      // });
      // const content = await rawResponse.json();
      // if (content.result) {
      //   document.getElementById("success").style.display = "block";
      //   resolve(content);
      // } else {
      //   reject(content);
      // }

    })
  }

  function redirect_crm() {
    let domain = "<?php echo app('auth')->user()->client->domain; ?>";

    //window.location= "https://"+document.getElementById('app_domain').value + "/crm/company/details/"+document.getElementById("bitrix_id").value+"/?IFRAME=Y&IFRAME_TYPE=SIDE_SLIDER";
      window.top.location = "https://" + domain + "/crm/company/details/" + document.getElementById("bitrix_id").value + "/";
    //document.getElementById('iframe_location').innerHTML = `<iframe src='${location}'></iframe>`;
  }
</script>
