var RemoteApi = (function($) {
    var apiUrl = "https://api.wapcard.se/api/v1/";
    var client = new $.RestClient('https://api.wapcard.se/api/v1');

    var postAjaxRequest = function(endpoint, data, token) {
        if(token) {
            var tokenString = "Token "+token.token;
            console.log(tokenString);
            return $.ajax({
                url: apiUrl+endpoint+"/",
                method: "POST",
                data: JSON.stringify(data),
                contentType: "application/json",
                headers: {"Authorization": tokenString},
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("Authorization", tokenString );
                },
                success:function(response){
                    console.log(response);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        }else{
            return $.ajax({
                url: apiUrl+endpoint+"/",
                method: "POST",
                contentType: "application/json",
                dataType: 'json',
                data: JSON.stringify(data),
                success:function(response){
                    console.log(response);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        }

    };

    var getAjaxRequest = function(endpoint, token) {
        if(token) {
            var tokenString = "Token "+token.token;
            return $.ajax({
                url: apiUrl+endpoint+"/",
                method: "GET",
                // xhrFields: { withCredentials: true },
                headers: { "Authorization": tokenString },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("Authorization", tokenString );
                },
                success:function(response){

                },
                error: function(errorThrown){

                }
            });
        }else{
            return $.ajax({
                url: apiUrl+endpoint+"/",
                method: "GET",
                success:function(response){

                },
                error: function(errorThrown){

                }
            });
        }

    };


    var register_user = function(data) {
        return postAjaxRequest('register', data);
    };

    var get_token = function(data) {
        return postAjaxRequest('token', data);
    };


    var get_profile = function() {

    };

    var update_profile = function(data, token) {
        return postAjaxRequest('me', data, token);
    };

    var add_employment = function (data, token) {
        return postAjaxRequest('me/employment', data, token);
    };

    var get_languages = function() {
        client.add('language');
        client.language.read().done(function(data, textStatus, xhrObject){
            alert('I have data: ' + data);
        });
    };

    var get_occupations = function(token) {
        return getAjaxRequest("occupations", token);
    };

    return {
        register_user: register_user,
        get_token: get_token,
        get_profile: get_profile,
        update_profile: update_profile,
        get_languages: get_languages,
        add_employment: add_employment,
        get_occupations: get_occupations
    };
})(jQuery);

