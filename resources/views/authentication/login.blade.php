<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>App</title>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="//api.bitrix24.com/api/v1/"></script>

    @include('layouts.scripts')

    <script>
        $(function() {
            BX24.init(function() {

                const redirect_url = "{{ $redirect_url }}";
                const auth = BX24.getAuth();
                const data = {
                    access_token: auth.access_token,
                    domain: auth.domain,
                };

                $.ajax({
                    type: 'POST',
                    url: "{{ url('auth/login') }}",
                    data: data,
                    // data: new FormData($(form)[0]),
                    // contentType: false,
                    // processData: false,
                    beforeSend: function(e) {},
                    complete: function(e) {},
                    success: function(e) {
                        // console.log(e);
                        setToken(e.access_token, e.token_type);
                        window.location.href = `${redirect_url}?token=${getToken()}`;
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

        })
    </script>

</body>

</html>