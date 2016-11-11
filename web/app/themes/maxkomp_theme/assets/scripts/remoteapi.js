var RemoteApi = (function($) {
    var apiUrl = "http://46.101.250.188:8000/api/";
    var client = new $.RestClient('http://46.101.250.188:8000/api/');

    var getCsrfToken = function() {
        $.ajax({
            url: apiUrl+'',
            method: "GET",
            crossDomain: true,
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Content-Type": "application/atom+xml",
                "DataServiceVersion": "2.0",
                "X-CSRF-Token":"Fetch"
            },
            success:function(response){
                var header_xcsrf_token = response.headers['x-csrf-token'];
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    };

    var register_user = function(email, password) {
        client.add('register');
        client.register.create({username:email, password:password}).done(function(data, textStatus, xhrObject){
            alert('I have data: ' + data);
        });
    };

    var get_profile = function() {

    };

    var get_languages = function() {
        client.add('language');
        client.language.read().done(function(data, textStatus, xhrObject){
            alert('I have data: ' + data);
        });
    };

    var fb_login = function(register){
        FB.login(function(response) {
            if (response.authResponse) {
                access_token = response.authResponse.accessToken; //get access token
                //console.log(access_token);
                data = {"access_token": access_token};
            } else {
                //user hit cancel button
                //console.log('User cancelled login or did not fully authorize.');
            }
        }, {
            scope: 'public_profile,email,user_birthday,user_location'
        });
    };

    return {
        register_user: register_user,
        get_profile: get_profile,
        get_languages: get_languages,
        getCsrfToken: getCsrfToken
    };
})(jQuery);