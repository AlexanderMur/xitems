jQuery(document).ready(function($) {

    $(window).on('load', function() {
        // Выполнение AJAX-запроса при нажатии на кнопку Входа
        $('form.logon').on('submit', function(e){
            let data = $('form.logon').serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
            console.log(data);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ajax_login_object.ajaxurl,
                data: {
                    'action': 'ajaxlogin',
                    'username': data.username,
                    'password': data.password,
                    'security': data.security
                },
                success: function(responce){
                    console.log(responce);
                    window.location.reload();
                }
            });
            e.preventDefault();
        });
    })


});

