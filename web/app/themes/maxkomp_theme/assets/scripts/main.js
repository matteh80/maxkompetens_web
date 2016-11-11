/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function () {
                // JavaScript to be fired on all pages

                                if($('#resume-wrapper').length) {
                    var test = $('.current_page_item').offset().left - $('#resume-wrapper').offset().left + ($('.current_page_item').outerWidth() / 2) -16;
                    $('.arrow').css("left", test);
                }


                // $(window).on("scroll resize", function() {
                //     $('section').each(function(index, element) {
                //         if($(element).offset().top <= 0 && !$(element).hasClass("fixed")) {
                //             $(element).addClass("fixed");
                //             console.log($(this).offset());
                //             console.log(index);
                //         }
                //     });
                // });

                $(window).on('scroll resize load', function() {
                    var scrolled = $(this).scrollTop();

                    // $('section').filter(function() {
                    //     return scrolled >= $(this).offset().top;
                    // }).addClass('fixed').next().css({
                    //     "margin-top" : $(this).outerHeight()
                    // });

                    // $('section').each(function(index, element) {
                    //     if(scrolled >= $(element).offset().top && !$(element).hasClass("fixed")) {
                    //         $(element).next().css("top", $(element).height());
                    //         $(element).addClass("fixed").css("top", 0);
                    //
                    //     }
                    // });

                    elHeight = $('.jumbo').outerHeight();
                    offset = $('.jumbo').offsetTop;

                    jumboPos = (scrolled / elHeight);

                    $('.jumbo').css({
                        "background-attachment": "fixed",
                        "background-position-y": jumboPos*100 + "%"
                    });

                });

                $.fn.extend({
                    animateCss: function (animationName, delay) {
                        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                        var el = this;
                        setTimeout(function(){
                            $(el).addClass('animated ' + animationName).one(animationEnd, function() {
                                // $(this).removeClass('animated ' + animationName);
                                $(this).removeClass(animationName);
                                $(this).removeClass("will-animate");
                                $(this).find('.spantext').addClass('animated rubberBand');
                            });
                        },delay);
                    }
                });

                $('.will-animate').one('inview', function(event, isInView) {
                    if (isInView) {
                        var animation = $(this).attr("data-class");
                        var delay = $(this).attr("data-delay");
                        $(this).animateCss(animation, delay);
                    }
                });

                //COUNT UP

                jQuery.fn.countUp = function(){
                    var that = this, target = parseInt(jQuery(that).attr("data-value"));
                    jQuery({countNum: jQuery(this).text()}).animate({countNum: target}, {
                        duration: 1000,
                        easing:'linear',
                        step: function() {
                            jQuery(that).text(Math.ceil(this.countNum));
                        },
                        complete:function() {
                            jQuery(that).text(Math.ceil(this.countNum));
                        }
                    });
                };

                if ( $('.count-up').length ) {
                    $('.count-up').text("0");

                    $('.count-up').one('inview', function(event, isInView) {
                        if (isInView) {
                            $(this).countUp();
                        }
                    });
                }
            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired
                function showMenu() {
                    $('.navbar-toggle').removeClass('collapsed');
                    $('.nav-primary').addClass("open");
                    // $('.overlay').css("opacity", "1");
                    $('.overlay').fadeIn('fast');
                    $('body').css("overflow", "hidden");
                    $('#toggle').hide();


                    // $.each($(".menu-item"), function(i, el){
                    //     setTimeout(function(){
                    //         $(el).animateCss('fadeInUp');
                    //     },200 + ( i * 100 ));
                    // });

                }

                function hideMenu() {
                    $('.menu-item').removeClass("animated");
                    $('.navbar-toggle').addClass('collapsed');
                    $('.nav-primary').removeClass("open");
                    // $('.overlay').css("opacity", "0");
                    $('.overlay').fadeOut('fast');
                    $('body').css("overflow", "auto");
                    $('.navbar-toggle').show();
                }

                $('.navbar-toggle').on('click', function () {
                    if ($(this).hasClass('collapsed')) {
                       showMenu();
                    } else {
                        hideMenu();
                    }
                });

                $('.nav-primary').mouseleave(function() {
                    hideMenu();
                });

                $('.overlay').click(function() {
                    hideMenu();
                });


                $(document).ready(function() {
                    var settings = {
                        speed: 800,
                        actions: false
                    };
                    LogoSlider.slider(settings);
                });
            }
        },
        // Bemanning
        'bemanning': {
            init: function () {

            },
            finalize: function () {
                $( function() {
                    $.widget( "custom.catcomplete", $.ui.autocomplete, {
                        _create: function() {
                            this._super();
                            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
                        },
                        _renderMenu: function( ul, items ) {
                            var that = this,
                                currentCategory = "";
                            $.each( items, function( index, item ) {
                                var li;
                                if ( item.category !== currentCategory ) {
                                    ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                                    currentCategory = item.category;
                                }
                                li = that._renderItemData( ul, item );
                                if ( item.category ) {
                                    li.attr( "aria-label", item.category + " : " + item.label );
                                }

                            });
                        }
                    });
                    var data = [
                        { label: "Administratör", category: "Administration", plural: "administratörer" },
                        { label: "Arkivering", category: "Administration", plural: "arkivarier" },
                        { label: "Assistent", category: "Administration", plural: "assistenter" },
                        { label: "Dataregistrering", category: "Administration", plural: "dataregistrerare" },
                        { label: "Fastighetsförvaltning", category: "Administration", plural: "fastighetsförvaltare" },
                        { label: "IT-konsult", category: "Data/IT", plural: "IT-konsulter" },
                        { label: "IT-säkerhet", category: "Data/IT", plural: "IT-säkerhetskonsulter" },
                        { label: "Systemanalys", category: "Data/IT", plural: "systemanalytiker" },
                        { label: "Systemarkitektur", category: "Data/IT", plural: "systemarkitekter" },
                        { label: "Systemutveckling", category: "Data/IT", plural: "systemutvecklare" },
                        { label: "Fastighetskötsel/HVAC", category: "Drift/Underhåll", plural: "fastighetsskötare" }

                    ];

                    $( "#kompetenser" ).catcomplete({
                        delay: 0,
                        source: data,
                        select: function( event, ui ) {
                            console.log( "Selected: " + ui.item.value + " aka " + ui.item.category );
                            $('html, body').animate({
                                scrollTop: $(".search-results").offset().top
                            }, 500, function() {
                                $('.search-results').css({
                                    "max-height": "1000px",
                                    "padding": "6rem"
                                });
                                $('#category').text(ui.item.plural);
                            });
                        }
                    });
                } );
            }
        },
        // About us page, note the change from about-us to about_us.
        'profil': {
            init: function () {

                $(window).on('scroll resize', function() {
                    $('#resume-wrapper').css("height", ($('#resume-wrapper').width() * 1.4142));
                });

                jQuery.fn.progressCount = function(){
                    var that = this, target = parseInt(jQuery(that).attr("data-value"));
                    var prevClass = "p0";
                    jQuery({countNum: 0}).animate({countNum: target}, {
                        duration: 1000,
                        easing:'linear',
                        step: function() {
                            jQuery(that).addClass("p"+Math.ceil(this.countNum));
                        },
                        complete:function() {
                            jQuery(that).addClass("p"+Math.ceil(this.countNum));
                            for(i = 0; i < 25; i++) {
                                jQuery(that).removeClass("p"+i);
                            }
                            jQuery(that).addClass("done");
                        }
                    });
                };
                $('.option').each(function(index, element) {
                   $(this).children('.c100').progressCount();
                });

                var options = {
                    strokeWidth: 10,
                    easing: 'bounce',
                    duration: 1400,
                    color: '#13d6ab',
                    trailColor: '#fff',
                    trailWidth: 1,
                    svgStyle: null
                };
                var options_personality = {
                    strokeWidth: 4,
                    easing: 'bounce',
                    duration: 1400,
                    color: '#ff4100',
                    trailColor: '#373a3c',
                    trailWidth: 1,
                    svgStyle: {width: '100%', height: '100%'}
                };
                var bar1 = new ProgressBar.SemiCircle('#progress', options);
                var bar2 = new ProgressBar.SemiCircle('#progress2', options);
                var bar3 = new ProgressBar.SemiCircle('#progress3', options);
                var bar4 = new ProgressBar.SemiCircle('#progress4', options);

                // var bar11 = new ProgressBar.Circle('#progress11', options);
                // var bar12 = new ProgressBar.Circle('#progress12', options);
                // var bar13 = new ProgressBar.Circle('#progress13', options);
                // var bar14 = new ProgressBar.Circle('#progress14', options);

                var bar11 = new ProgressBar.Line('#person-bar1', options_personality);
                var bar12 = new ProgressBar.Line('#person-bar2', options_personality);
                var bar13 = new ProgressBar.Line('#person-bar3', options_personality);
                var bar14 = new ProgressBar.Line('#person-bar4', options_personality);
                var bar15 = new ProgressBar.Line('#person-bar5', options_personality);

                $('#progress').one('inview', function(event, isInView) {
                    if (isInView) {
                        bar1.animate(1);
                        bar2.animate(0.6);
                        bar3.animate(0.8);
                        bar4.animate(0.4);

                        bar11.animate(1);
                        bar12.animate(0.6);
                        bar13.animate(0.8);
                        bar14.animate(0.4);
                        bar15.animate(1);
                    }
                });
            }
        },
        'registering': {
            init: function () {

                var active_page = $('.active').attr("id");
                $('body').addClass(active_page);

                $( ".slider" ).slider({
                    value:5,
                    min: 0,
                    max: 10,
                    step: 1,
                    slide: function( event, ui ) {
                        $( "#amount" ).val( "$" + ui.value );
                        var left_size = 100-(ui.value*10);
                        var right_size = 100-left_size;
                        $(this).siblings('.left').css("font-size", left_size+30+"%");
                        $(this).siblings('.right').css("font-size", right_size+30+"%");
                        console.log(ui.value);
                        $('.active').addClass('started');
                    }
                });
                $( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) );

                var gotoNextTab = function() {
                    $('.active').addClass('done');
                    var next_tab = $('.active').next().attr("id");
                    // console.log(next_tab+" Active: "+active_tab);
                    $('.nav-item a[href="#'+next_tab+'"]').tab('show');
                    $('body').removeClass(active_page).addClass(next_tab);
                    console.log(JSON.parse(sessionStorage.getItem('user')));
                };

                var formValidation = function() {
                    console.log('Active page: '+active_page);
                    switch(active_page) {
                        case "page0":
                            $('#register_form').validate({
                                errorPlacement: function(error, element) {
                                    error.appendTo( element.parent() );
                                },
                                rules: {
                                    cpassword: {
                                        equalTo: "#password"
                                    }
                                },
                                // Specify validation error messages
                                messages: {
                                    password: {
                                        required: "Ange ditt lösenord"
                                    },
                                    cpassword: {
                                        equalTo: "Lösenordet matchar inte"
                                    },
                                    email: "Please enter a valid email address"
                                },
                                // Make sure the form is submitted to the destination defined
                                // in the "action" attribute of the form when valid
                                submitHandler: function(form) {
                                    data = {
                                        "email": $('#email').val(),
                                        "password": $('#password').val(),
                                    };

                                    RemoteApi.register_user(data).done(function(data, textStatus, xhrObject){
                                        if(textStatus === 'success') {
                                            gotoNextTab();
                                        }
                                    });
                            }
                            });
                            break;
                    }
                };

                $('input').on('focus change', function() {
                    console.log('change');
                   $('.active').addClass('started');
                });


                $('a.nav-link').on('click', function() {
                    if($(this).hasClass('done') || $(this).hasClass('started')) {
                        return true;
                    }else{
                        return false;
                    }
                });

                $('#next_btn').on('click', function() {
                    formValidation();
                });
                $('#register_btn').on('click', function(){
                    return false;
                });

                $('li').tooltip();

                // Here we run a very simple test of the Graph API after login is
                // successful.  See statusChangeCallback() for when this call is made.

                // This function is called when someone finishes with the Login
                // Button.  See the onlogin handler attached to it in the sample
                // code below.

                function testAPI() {
                    var fields = {fields: 'email, first_name, last_name, user_birthday'};
                    console.log('Welcome!  Fetching your information.... ');
                    FB.api('/me', fields, function(response) {
                        console.log(response);
                        console.log('Successful login for: ' + response.name);

                        sessionStorage.setItem('user', JSON.stringify(response));
                    });
                }

                // This is called with the results from from FB.getLoginStatus().
                function statusChangeCallback(response) {
                    console.log('statusChangeCallback');
                    console.log(response);
                    // The response object is returned with a status field that lets the
                    // app know the current login status of the person.
                    // Full docs on the response object can be found in the documentation
                    // for FB.getLoginStatus().
                    if (response.status === 'connected') {
                        // Logged into your app and Facebook.
                        testAPI();
                    } else if (response.status === 'not_authorized') {
                        // The person is logged into Facebook, but not your app.
                        FB.login(function(response) {
                            testAPI();
                        });

                    } else {
                        // The person is not logged into Facebook, so we're not sure if
                        // they are logged into this app or not.
                        FB.login(function(response) {
                            testAPI();
                        }, {
                            scope: 'public_profile,email,user_birthday,user_location',
                            return_scopes: true
                        });
                    }
                }

                function checkLoginState() {
                    FB.getLoginStatus(function(response) {
                        statusChangeCallback(response);
                    });
                }

                window.fbAsyncInit = function() {
                    FB.init({
                        appId      : '328788464164283',
                        cookie     : true,  // enable cookies to allow the server to access
                                            // the session
                        xfbml      : true,  // parse social plugins on this page
                        version    : 'v2.8' // use graph api version 2.8
                    });

                    // Now that we've initialized the JavaScript SDK, we call
                    // FB.getLoginStatus().  This function gets the state of the
                    // person visiting this page and can return one of three states to
                    // the callback you provide.  They can be:
                    //
                    // 1. Logged into your app ('connected')
                    // 2. Logged into Facebook, but not your app ('not_authorized')
                    // 3. Not logged into Facebook and can't tell if they are logged into
                    //    your app or not.
                    //
                    // These three cases are handled in the callback function.

                    FB.getLoginStatus(function(response) {
                        if(response.status === 'connected') {
                            FB.logout();
                        }
                    });

                };

                // Load the SDK asynchronously
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)){
                        return;
                    }
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));


                $('.btn-facebook').on('click', function() {
                    checkLoginState();
                });
            }
        }

    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function (func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

var User = (function() {
    var firstName;
    var lastName;
    var email;
    var profile_picture;
    var location;
    var birth;
    var gender;
    var id;

    return {
        firstName: firstName,
        lastName: lastName,
        email: email,
        profile_picture: profile_picture,
        location: location,
        birth: birth,
        gender: gender,
        id: id,
    };
})();
