<script>
    const app_name = "{{ strtolower(preg_replace('/\s+/', '', env('APP_NAME'))) }}";
    const token_type_key = `br24-${app_name}-token-type`;
    const token_value_key = `br24-${app_name}-token-value`;

    function getAuthorization() {
        return `${localStorage.getItem(token_type_key)} ${localStorage.getItem(token_value_key)}`
    }

    function getToken() {
        return localStorage.getItem(token_value_key);
    }

    function setToken(access_token, token_type) {
        localStorage.setItem(token_value_key, access_token);
        localStorage.setItem(token_type_key, token_type);
    }

    window.translations = <?php echo json_encode(trans('messages')); ?>;

    function trans(value) {

        let res = value.split('.');

        var temp = window.translations;

        for (let index = 0; index < res.length; index++) {
            const element = res[index];

            if (index == (res.length - 1)) {
                return temp[element];
            }

            if (temp[element] != 'undefined') {
                temp = window.translations[element];
            } else {
                break;
            }
        }
    }
</script>