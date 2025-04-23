<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
  <script src="https://kit.fontawesome.com/6cc91b2c09.js"></script>
  <script src="//api.bitrix24.com/api/v1/"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ app('url')->asset('css/app.css') }}">

  <title>App CNPJ</title>

  @include('layouts.scripts')
</head>

<body>

  <div class="container-fluid">

    <!--script>
      (function(w,d,u){
              var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
              var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
      })(window,document,'https://cdn.bitrix24.com.br/b3960009/crm/site_button/loader_15_bhmfu4.js');
    </script-->
    
    <!-- Reaproveitamento de código do widget do API - Whatsapp -->

  <script>
    window.mobileCheck = function () {
      // https://stackoverflow.com/questions/11381673/detecting-a-mobile-browser
      let check = false;
      (function (a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
      return check;
    };
  </script>

  <!-- Floating Button do suporte -->
  <script>
    function showButtonClient() {
      (function (w, d, u) {
        const domain = window.BX24.getDomain();
        var s = d.createElement('script');

        s.async = true;
        s.src = u + '?' + (Date.now() / 60000 | 0);

        var h = d.getElementsByTagName('script')[0];

        h.parentNode.insertBefore(s, h);

        var i = 0;
      })(window, document, 'https://cdn.bitrix24.com.br/b3960009/crm/site_button/loader_15_bhmfu4.js');
    }

    function showButtonNotClient() {
      (function (w, d, u) {
        var s = d.createElement('script'); s.async = true; s.src = u + '?' + (Date.now() / 60000 | 0);
        var h = d.getElementsByTagName('script')[0]; h.parentNode.insertBefore(s, h);
      })(window, document, 'https://cdn.bitrix24.com.br/b3960009/crm/site_button/loader_20_tbbgqf.js');
    }

    if (!window.mobileCheck()) {
      const domain = window.BX24.getDomain();
      const tries = ["https://app2.br24.io/wp-json/br24/v1/order_by_domain?domain=" + domain + "&consumer_key=ck_cc61f5a3a65c8f3ebe2e46845dbc1b022ef78e34&consumer_secret=cs_eed470ce0a297c29ae8d590bebda010b9d6610b7",
      "https://app2.br24.io/wp-json/br24/v1/order_by_domain?domain=https://" + domain + "&consumer_key=ck_cc61f5a3a65c8f3ebe2e46845dbc1b022ef78e34&consumer_secret=cs_eed470ce0a297c29ae8d590bebda010b9d6610b7",
      "https://app2.br24.io/wp-json/br24/v1/order_by_domain?domain=https://" + domain + "/&consumer_key=ck_cc61f5a3a65c8f3ebe2e46845dbc1b022ef78e34&consumer_secret=cs_eed470ce0a297c29ae8d590bebda010b9d6610b7"];
      var i = 0;
      var xmlHttp = new XMLHttpRequest();

      xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && (xmlHttp.status >= 200 && xmlHttp.status < 300)) {

          response = JSON.parse(xmlHttp.responseText);
          console.log(response);

          if (response.length > 0) {

            response = response[0];

            if (response.status == "active") {
              for (const item of response.items) {
                if (item.product.id == 34365 ||
                  item.product.id == 34370) {
                  showButtonClient();
                } else if (item.product.parent_id == 34365 ||
                  item.product.parent_id == 34370) {
                  showButtonClient();
                }
              }
            }
            else {
              showButtonNotClient();
            }

          } else {
            showButtonNotClient();
          }

        } else if (xmlHttp.readyState == 4 && (xmlHttp.status >= 400 || xmlHttp.status < 600)) {
          if (i < tries.length) {
            i += 1;
            xmlHttp.open("GET", tries[i], true); // true for asynchronous 
            xmlHttp.send(null);
          }
          else if (!window.mobileCheck()) {
            showButtonNotClient();
          }
        }

      }
      xmlHttp.open("GET", tries[i], true); // true for asynchronous 
      xmlHttp.send(null);
    }

  </script>

    <style>
      #myTabContent {
        padding: 15px;
        border-left: 1px solid #dee2e6;
        border-right: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
        min-height: 500px;
      }
    </style>

    <div class="row">
      <div class="col">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="cnpj-tab" data-toggle="tab" href="#cnpj" role="tab" aria-controls="cnpj"
              aria-selected="true">
              <?php echo trans('messages.cnpj_tab') ?>
            </a>
          </li>

          @if (app('auth')->user()->is_bitrix_admin)
          <li class="nav-item">
            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings"
              aria-selected="false">
              <?php echo trans('messages.settings_tab') ?>
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" id="help-tab" data-toggle="tab" href="#help" role="tab" aria-controls="help"
              aria-selected="true">
              <?php echo trans('messages.help_tab') ?>
            </a>
          </li>

        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="cnpj" role="tabpanel" aria-labelledby="cnpj-tab">
            @include('dashboard.cnpj_search')
          </div>
          @if (app('auth')->user()->is_bitrix_admin)
          <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            @include('dashboard.config')
          </div>
          @endif
          <div class="tab-pane fade" id="help" role="tabpanel" aria-labelledby="help-tab">
            @include('dashboard.help')
          </div>
        </div>

        <div id="iframe_location"></div>

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo trans('messages.btn_are_you_sure') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn"
                  data-dismiss="modal"><?php echo trans('messages.btn_cancel') ?></button>
                <button type="button" class="btn btn-success" data-dismiss="modal"
                  onclick="registerCompanyOnBitrix()"><?php echo trans('messages.btn_confirm') ?></button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="atualizarModal" tabindex="-1" role="dialog" aria-labelledby="atualizarModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo trans('messages.btn_are_you_sure') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn"
                  data-dismiss="modal"><?php echo trans('messages.btn_cancel') ?></button>
                <button type="button" class="btn btn-success" data-dismiss="modal"
                  onclick="updateCompanyOnBitrix()"><?php echo trans('messages.btn_confirm') ?></button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="detalhes" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes da empresa</h5>
              </div>
              <div class="modal-body" id="body_details">

              </div>
            </div>
          </div>
        </div>

      </div>

      @if ($billing->lifelong == false)

      <div class="col-3">

        @include('signature.choose_plan')

        @if ($billing->subscripted)

        <div id="signature" class="card active-signature">
          <div class="card-header">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal_signature">
              {{ trans('messages.subscription.renew') }}
            </button>
          </div>
          <div class="card-body">
            <p>{{ trans('messages.subscription.next_payment') }}</p>
            <p class="days">{{ $billing->daysRemaining }} {{ trans('messages.subscription.days') }}</p>
          </div>
        </div>

        @elseif ($billing->trial)

        <div id="signature" class="card active-signature">
          <div class="card-header">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal_signature">
              {{ trans('messages.subscription.new') }}
            </button>
          </div>
          <div class="card-body">
            <p>
              <span class="badge badge-pill badge-warning">Trial</span>
            </p>
            <p>{{ trans('messages.subscription.next_payment') }}</p>
            <p class="days">{{ $billing->trialDaysRemaining }} {{ trans('messages.subscription.days') }}</p>
          </div>
        </div>

        @else

        <div id="signature" class="card not-active-signature">
          <div class="card-header">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal_signature">
              {{ trans('messages.subscription.renew') }}
            </button>
          </div>
          <div class="card-body">
            <span>{{ trans('messages.subscription.expired') }}</span>
          </div>
        </div>

        @endif

      </div>

      @endif

    </div>

  </div>

  <script>
    $(function() {

    })
  </script>

  <style>
    .btn-light {
      display: inline-block;
      margin-right: 5px;
      background-color: #bbed21;
      border-radius: 0;
      text-align: center;
      margin-left: 10;
      color: #535c69;
      font-weight: 600;
      border: none;
    }

    .btn-light.hover,
    .btn-light:hover {
      display: inline-block;
      margin-right: 5px;
      background-color: #bbed21;
      border-radius: 0;
      text-align: center;
      margin-left: 10;
      color: #535c69;
      font-weight: 600;
      border: none;
    }

    .btn-light.focus,
    .btn-light:focus {
      display: inline-block;
      margin-right: 5px;
      background-color: #bbed21;
      border-radius: 0;
      text-align: center;
      margin-left: 10;
      color: #535c69;
      font-weight: 600;
      border: none;
    }

    .active-signature .card-header {
      background-color: rgb(75, 185, 234);
      color: rgb(255, 255, 255);
    }

    .active-signature .card-body {
      background-color: rgb(79, 195, 247);
      color: rgb(255, 255, 255);
      text-align: right;
    }

    .active-signature .card-body p.days {
      font-size: 40px;
    }

    .not-active-signature .card-header {
      background-color: rgb(187, 187, 187);
      color: rgb(255, 255, 255);
    }

    .not-active-signature .card-body {
      background-color: rgb(210, 210, 210);
      color: rgb(255, 255, 255);
    }
  </style>


</body>

</html>