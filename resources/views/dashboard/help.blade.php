<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-overview-tab" data-toggle="pill" href="#v-pills-overview" role="tab"
        aria-controls="v-pills-overview" aria-selected="true">{{ trans('messages.help.overview.title') }}</a>
      <a class="nav-link" id="v-pills-howtoconfig-tab" data-toggle="pill" href="#v-pills-howtoconfig" role="tab"
        aria-controls="v-pills-howtoconfig" aria-selected="false">{{ trans('messages.help.howtoconfig.title') }}</a>
      <a class="nav-link" id="v-pills-howtouse-tab" data-toggle="pill" href="#v-pills-howtouse" role="tab"
        aria-controls="v-pills-howtouse" aria-selected="false">{{ trans('messages.help.howtouse.title') }}</a>
      @if ($billing->lifelong == false)
      <a class="nav-link" id="v-pills-appsubscription-tab" data-toggle="pill" href="#v-pills-appsubscription" role="tab"
        aria-controls="v-pills-appsubscription"
        aria-selected="false">{{ trans('messages.help.appsubscription.title') }}</a>
      @endif
      <a class="nav-link" id="v-pills-receitasubscription-tab" data-toggle="pill" href="#v-pills-receitasubscription"
        role="tab" aria-controls="v-pills-receitasubscription"
        aria-selected="false">{{ trans('messages.help.receitasubscription.title') }}</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-overview" role="tabpanel"
        aria-labelledby="v-pills-overview-tab">
        <p>{!! __('messages.help.overview.p.1') !!}</p>
        <p>{!! __('messages.help.overview.p.2') !!}</p>
        <p>{!! __('messages.help.overview.p.3', ['receita_ws' => config('receita_ws.url')]) !!}</p>
        <p>{!! __('messages.help.overview.p.4') !!}</p>
        <p class="text-danger">
          <i class="fas fa-exclamation-circle"></i>
          {!! __('messages.help.overview.p.5', ['receita_ws' => config('receita_ws.url'), 'howtoconfig' =>
          '#v-pills-howtoconfig-tab']) !!}
        </p>
      </div>
      <div class="tab-pane fade" id="v-pills-howtoconfig" role="tabpanel" aria-labelledby="v-pills-howtoconfig-tab">
        <p>{!! __('messages.help.howtoconfig.p.1') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_ir_config.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.howtoconfig.p.2') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_configs.png') }}" style="width: 500px;">
          </a>
        </p>
        <p class="text-danger">
          <i class="fas fa-exclamation-circle"></i>
          {!! __('messages.help.howtoconfig.p.3') !!}
        </p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_config_cnpj.png') }}" style="width: 500px;">
          </a>
        </p>
      </div>
      <div class="tab-pane fade" id="v-pills-howtouse" role="tabpanel" aria-labelledby="v-pills-howtouse-tab">
        <p class="text-danger">
          <i class="fas fa-exclamation-circle"></i>
          {!! __('messages.help.howtouse.p.1', ['howtoconfig' => '#v-pills-howtoconfig-tab']) !!}
        </p>
        <p>{!! __('messages.help.howtouse.p.2') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_buscar.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.howtouse.p.3') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_retorno.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.howtouse.p.4') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_cadastrar.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.howtouse.p.5') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_atualizar.png') }}" style="width: 500px;">
          </a>
        </p>
      </div>

      @if ($billing->lifelong == false)
      <div class="tab-pane fade" id="v-pills-appsubscription" role="tabpanel"
        aria-labelledby="v-pills-appsubscription-tab">
        <p>{!! __('messages.help.appsubscription.p.1') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_assinar.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.appsubscription.p.2') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_planos.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.appsubscription.p.3') !!}</p>
      </div>
      @endif

      <div class="tab-pane fade" id="v-pills-receitasubscription" role="tabpanel"
        aria-labelledby="v-pills-receitasubscription-tab">
        <p>{!! __('messages.help.receitasubscription.p.1', ['receita_ws_pricing' => config('receita_ws.url_pricing')])
          !!}</p>
        <p>{!! __('messages.help.receitasubscription.p.2', ['receita_ws_account' => config('receita_ws.url_account')])
          !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_receitaws_gerartoken.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.receitasubscription.p.3') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_receitaws_nometoken.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.receitasubscription.p.4') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_receitaws_token.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.receitasubscription.p.5') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_ir_config.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.receitasubscription.p.6') !!}</p>
        <p>
          <a href="#" class="pop">
            <img src="{{ url('/helpers/CNPJ_token.png') }}" style="width: 500px;">
          </a>
        </p>
        <p>{!! __('messages.help.receitasubscription.p.7') !!}</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="openBiggerImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" class="imagepreview" style="width: 100%;">
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('.pop').on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#openBiggerImage').modal('show');
    });

    // Triggers com botão externo (sem ser pela pill)
    $('[href="#v-pills-overview-tab"]').on('click', function (e) {
      e.preventDefault();
      $('.nav-link[href="#v-pills-overview"]').trigger('click');
    });
    $('[href="#v-pills-howtoconfig-tab"]').on('click', function (e) {
      e.preventDefault();
      $('.nav-link[href="#v-pills-howtoconfig"]').trigger('click');
    });
    $('[href="#v-pills-howtouse-tab"]').on('click', function (e) {
      e.preventDefault();
      $('.nav-link[href="#v-pills-howtouse"]').trigger('click');
    });
    $('[href="#v-pills-appsubscription-tab"]').on('click', function (e) {
      e.preventDefault();
      $('.nav-link[href="#v-pills-appsubscription"]').trigger('click');
    });
    $('[href="#v-pills-receitasubscription-tab"]').on('click', function (e) {
      e.preventDefault();
      $('.nav-link[href="#v-pills-receitasubscription"]').trigger('click');
    });
  })
</script>