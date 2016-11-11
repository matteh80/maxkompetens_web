var RemoteApi = (function($) {
    var apiUrl = "http://46.101.250.188/api/";
    var client = new $.RestClient('http://46.101.250.188/api/');


    var register_user = function(data) {
        client.add('register');
        return client.register.create(data);
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
        get_languages: get_languages
    };
})(jQuery);