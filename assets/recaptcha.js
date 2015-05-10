(function($){

    $(document).ready(function() {

        var url          = location.href+'/saveconfig',
            $site_key    = $('#site_key'),
            $secret_key  = $('#secret_key');
            $('#saveRecaptcha').click(function () {
                $.post(url, {settings: {
                    site_key: $site_key.val(),
                    secret_key: $secret_key.val()
                }}, function(json) {
                    UIkit.notify(json);
                }, 'json');
            });
    });

})(jQuery);