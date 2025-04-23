<style>
  .col-form-label {
    padding-top: 0px;
    padding-bottom: 0px;
  }
</style>

<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.cnpj_field') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}, {{ trans('messages.validation.required') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["cnpj_field"] : '',
    'id' => "cnpj_field",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label">
        <?php echo trans('messages.settings.cpnj_controll') ?>
        <small class="form-text text-muted"><?php echo trans('messages.settings.cpnj_controll_description') ?></small>
    </label>
    <div class="col-sm-8">
        <?php
        $user_duplicate=  $fields_map ? $fields_map["usar_controll_cnpj"] : '';
        //echo $user_duplicity;
        ?>
        <select id="usar_controll_cnpj" class="form-control">
            <option value="false" <?= $user_duplicate == "false" ? " selected='selected' " : "" ?>><?php echo trans('messages.no') ?></option>
            <option value="true" <?= $user_duplicate == "true" ? " selected='selected' " : ""  ?>><?php echo trans('messages.yes') ?></option>
        </select>
    </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.main_activity_description') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}, {{ trans('messages.validation.multiple') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["atividade_principal"] : '',
    'id' => "atividade_principal",
    'type' => ["string"],
    'multiple' => true,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.main_activity_id') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}, {{ trans('messages.validation.multiple') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["atividade_principal_codigo"] : '',
    'id' => "atividade_principal_codigo",
    'type' => ["string"],
    'multiple' => true,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.side_activity_description') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}, {{ trans('messages.validation.multiple') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["atividades_secundarias"] : '',
    'id' => "atividades_secundarias",
    'type' => ["string"],
    'multiple' => true,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.side_activity_id') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}, {{ trans('messages.validation.multiple') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["atividades_secundarias_codigo"] : '',
    'id' => "atividades_secundarias_codigo",
    'type' => ["string"],
    'multiple' => true,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.status_date') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.date') }}, {{ trans('messages.validation.datetime') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["data_situacao"] : '',
    'id' => "data_situacao",
    'type' => ["date", "datetime"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.qsa') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}, {{ trans('messages.validation.multiple') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["qsa"] : '',
    'id' => "qsa",
    'type' => ["string"],
    'multiple' => true,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.situation') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["situacao"] : '',
    'id' => "situacao",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.company_size') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["porte"] : '',
    'id' => "porte",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.opened_since') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.date') }}, {{ trans('messages.validation.datetime') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["abertura"] : '',
    'id' => "abertura",
    'type' => ["date", "datetime"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.legal_nature') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["natureza_juridica"] : '',
    'id' => "natureza_juridica",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.fantasy_name') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["fantasia"] : '',
    'id' => "fantasia",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.last_update') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.date') }}, {{ trans('messages.validation.datetime') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["ultima_atualizacao"] : '',
    'id' => "ultima_atualizacao",
    'type' => ["date", "datetime"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.status') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["status"] : '',
    'id' => "status",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.type') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["tipo"] : '',
    'id' => "tipo",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.additional') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["complemento"] : '',
    'id' => "complemento",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.efr') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["efr"] : '',
    'id' => "efr",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.status_reason') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["motivo_situacao"] : '',
    'id' => "motivo_situacao",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.special_situation') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["situacao_especial"] : '',
    'id' => "situacao_especial",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.special_situation_date') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.date') }}, {{ trans('messages.validation.datetime') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["data_situacao_especial"] : '',
    'id' => "data_situacao_especial",
    'type' => ["date", "datetime"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.share_capital') ?>:
    <small class="form-text text-muted">{{ trans('messages.validation.text') }}</small>
  </label>
  <div class="col-sm-8">
    @include('dashboard.render_select', [
    'field' => $fields_map ? $fields_map["capital_social"] : '',
    'id' => "capital_social",
    'type' => ["string"],
    'multiple' => false,
    ])
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.cpnj_mask') ?>
    <small class="form-text text-muted"></small>
  </label>
  <div class="col-sm-8">
    <?php
    $user_mascara =  $fields_map ? $fields_map["usar_mascara_cnpj"] : '';
    //echo $user_mascara;
    ?>
    <select id="usar_mascara_cnpj" class="form-control">
      <option value="true" <?= $user_mascara == "true" ? " selected='selected' " : ""  ?>><?php echo trans('messages.yes') ?></option>
      <option value="false" <?= $user_mascara == "false" ? " selected='selected' " : "" ?>><?php echo trans('messages.no') ?></option>
    </select>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">
    <?php echo trans('messages.settings.token_api') ?>:
    <small class="form-text text-muted"><?php echo trans('messages.settings.token_api_description') ?></small>
  </label>
  <div class="col-sm-8">
    <?php
    $token_rws =  $fields_map ? $fields_map["token_rws"] : '';
    //echo $user_mascara;
    ?>
    <input class="form-control" id="token_rws" name="token_rws" value="<?= $token_rws ?>" />
  </div>
</div>


<button type="button" class="btn btn-success" onclick="save()">
  <?php echo trans('messages.save') ?>
</button>

<script>
  $(function() {
    $("#cnpj-input").mask("99.999.999/9999-99");
  })

  function save() {
    var fields = {
      cnpj_field: "-1",
      usar_controll_cnpj: "-1",
      atividade_principal: "-1",
      data_situacao: "-1",
      atividades_secundarias: "-1",
      qsa: "-1",
      situacao: "-1",
      porte: "-1",
      abertura: "-1",
      natureza_juridica: "-1",
      fantasia: "-1",
      ultima_atualizacao: "-1",
      status: "-1",
      tipo: "-1",
      complemento: "-1",
      efr: "-1",
      motivo_situacao: "-1",
      situacao_especial: "-1",
      data_situacao_especial: "-1",
      capital_social: "-1",
      usar_mascara_cnpj: "-1",
      atividades_secundarias_codigo: "-1",
      atividade_principal_codigo: "-1",
      token_rws: "-1",
    }
    Object.keys(fields).forEach((f) => {
      fields[f] = document.getElementById(f).value;
    })

    $.ajax({
      type: 'POST',
      url: "{{ route('config.save') }}",
      headers: {
        "Authorization": getAuthorization(),
      },
      data: {
        fields
      },
      success: function(e) {
        alert(trans('settings.save_success'));
        location.reload();
      },
      error: function(e) {
        alert(trans('settings.save_error'));
      }
    });

  }
</script>
