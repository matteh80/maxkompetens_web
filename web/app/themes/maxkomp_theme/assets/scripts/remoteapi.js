var RemoteApi = (function($) {
    var apiUrl = "http://46.101.250.188/api/";
    var client = new $.RestClient('http://46.101.250.188/api/');

    var postAjaxRequest = function(endpoint, data, token) {
        if(token) {
            return $.ajax({
                url: apiUrl+endpoint+"/",
                contentType: "application/json",
                method: "POST",
                headers: {"Authorization": 'Token ' + sessionStorage.getItem('token')},
                beforeSend: function(xhr) {
                    if (sessionStorage.getItem('token')) {
                        xhr.setRequestHeader('Authorization',
                            'Token ' + sessionStorage.getItem('token'));
                    }
                },
                success:function(response){

                },
                error: function(errorThrown){

                }
            });
        }else{
            return $.ajax({
                url: apiUrl+endpoint+"/",
                method: "POST",
                data: data,
                success:function(response){

                },
                error: function(errorThrown){

                }
            });
        }

    };

    var getAjaxRequest = function(endpoint) {
        if(method === 'GET') {
            headers = {"Authorization": 'Token ' + sessionStorage.getItem('token')};
        }
        return $.ajax({
            url: apiUrl+endpoint+"/",
            contentType: "application/json",
            method: "GET",
            processData: false,
            async: true,
            cache: false,
            dataType: 'json',
            headers: headers,
            beforeSend: function(xhr) {
                if (sessionStorage.getItem('token')) {
                    xhr.setRequestHeader('Authorization',
                        'Token ' + sessionStorage.getItem('token'));
                }
            },
            success:function(response){

            },
            error: function(errorThrown){

            }
        });
    };


    var register_user = function(data) {
        return postAjaxRequest('register', data);
    };

    var get_token = function(data) {
        return postAjaxRequest('token', data);
    };


    var get_profile = function() {

    };

    var update_profile = function(data) {
        return postAjaxRequest('me', data, token);
    };

    var get_languages = function() {
        client.add('language');
        client.language.read().done(function(data, textStatus, xhrObject){
            alert('I have data: ' + data);
        });
    };

    return {
        register_user: register_user,
        get_token: get_token,
        get_profile: get_profile,
        update_profile: update_profile,
        get_languages: get_languages
    };
})(jQuery);

