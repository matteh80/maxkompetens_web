var RemoteApi = (function($) {
    var apiUrl = "http://46.101.250.188/api/";
    var client = new $.RestClient('http://46.101.250.188/api/');

    var postAjaxRequest = function(endpoint, data, token) {
        console.log("data");
        console.log(data);
        if(token) {
            return $.ajax({
                url: apiUrl+endpoint+"/",
                method: "POST",
                data: JSON.stringify(data),
                contentType: "application/json",
                headers: {"Authorization": 'Token ' + token},
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
        return $.ajax({
            url: apiUrl+endpoint+"/",
            method: "GET",
            async: true,
            xhrFields: { withCredentials: true },
            headers: { "Authorization": 'Token d4e98ce630af4fd6ff3cc2cbb5887762babff692' },
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Token d4e98ce630af4fd6ff3cc2cbb5887762babff692" );
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

    var update_profile = function(data, token) {
        // return postAjaxRequest('me', data, token);
        return getAjaxRequest('me', token);
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

