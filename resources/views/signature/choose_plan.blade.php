<style>
  #modal_signature {
    text-align: center;
  }
  #modal_signature .modal-dialog {
    min-width: 900px;
  }

  #modal_signature .card-category {
    font-size: .875rem;
    text-transform: uppercase;
    text-align: center;
    font-weight: 600;
    letter-spacing: .05em;
    margin: 0 0 .5rem;
  }

  #modal_signature .price {
    font-weight: 300;
    line-height: 1.1;
    font-size: 3.5rem;
  }

  #modal_signature .fa-check {
    color: #5eba00;
  }

  #modal_signature iframe {
    display: none;
  }

  #modal_signature .modal-footer {
    display: block;
  }

  #modal_signature .modal-footer .btn-light {
    float: left;
  }
</style>
<div id="modal_signature" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ trans('messages.subscription.renew_now') }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!--<iframe id="finalizar_compra_mensal" src="https://app2.br24.io/flow/finalizar-compra-consulta-cnpj-mensal/?domain={{ app('auth')->user()->domain }}" style="display: none" width="100%" height="500px" style="position: relative; display: block;"></iframe>
        <iframe id="finalizar_compra_anual" src="https://app2.br24.io/flow/finalizar-compra-consulta-cnpj-anual/?domain={{ app('auth')->user()->domain }}" style="display: none" width="100%" height="500px" style="position: relative; display: block;"></iframe>-->

        <div id="signature_plans" class="row">
         {{-- <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="card-category">
                  {{ trans('messages.subscription.desconto_ano') }}
                </div>
                <p>{{ trans('messages.subscription.before_price') }}</p>
                <div class="price mt-3 mb-3">$140/{{ trans('messages.subscription.year') }} </div>
                <ul class="list-unstyled leading-loose">
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.0') }}</li>
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.1') }}</li>
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.2') }}</li>
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.3') }}</li>
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.4') }}</li>
                </ul>
                <button id="annual_renewal" type="button" class="btn btn-light">
                  {{ trans('messages.subscription.renew_now') }}
                </button>
              </div>
            </div>
          </div> --}}
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="card-category">
                  {{ trans('messages.subscription.month') }}
                </div>
                <p>{{ trans('messages.subscription.before_price') }}</p>
                <div class="price mt-3 mb-3">$14/{{ trans('messages.subscription.month') }} </div>
                <ul class="list-unstyled leading-loose">
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.0') }}</li>
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.1') }}</li>
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.2') }}</li>
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.3') }}</li>
                  <li> <i class="fas fa-check mr-2"></i>{{ trans('messages.subscription.items.4') }}</li>
                </ul>
                <button id="monthly_renewal" type="button" class="btn btn-light">
                  {{ trans('messages.subscription.renew_now') }}
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button style="display: none" type="button" class="btn btn-light">{{ trans('messages.subscription.back') }}</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {

    $('#monthly_renewal').on('click', function(e) {
      window.open("https://app2.br24.io/flow/finalizar-compra-consulta-cnpj-mensal/?domain={{ app('auth')->user()->domain }}");
     /*  $('#modal_signature #finalizar_compra_mensal').show();
      $('#modal_signature #signature_plans').hide();
      $('#modal_signature .modal-footer button').show(); */
    })

    $('#annual_renewal').on('click', function(e) {
      $('#modal_signature #finalizar_compra_anual').show();
      $('#modal_signature #signature_plans').hide();
      $('#modal_signature .modal-footer button').show();
    })

    $('#modal_signature .modal-footer button').on('click', function(e) {
      $('#modal_signature iframe').hide();
      $('#modal_signature #signature_plans').show();
      $('#modal_signature .modal-footer button').hide();
    })
  })
</script>
