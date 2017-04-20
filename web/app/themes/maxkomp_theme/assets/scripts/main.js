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

        $('input:not(:checkbox), textarea, select').each(function (e, i) {
          $(this).parent().append('<span>' + $(this).attr("placeholder") + '</span>');
        });
        $('input').on('focus change', function () {
          console.log('change');
          $('.active').addClass('started');
          var input = $(this);
          if (input.val().length) {
            input.addClass('populated');
          } else {
            input.removeClass('populated');
          }
        });

        setTimeout(function () {
          $('#fname').trigger('focus');
        }, 500);


        // $(window).on("scroll resize", function() {
        //     $('section').each(function(index, element) {
        //         if($(element).offset().top <= 0 && !$(element).hasClass("fixed")) {
        //             $(element).addClass("fixed");
        //             console.log($(this).offset());
        //             console.log(index);
        //         }
        //     });
        // });

        $(window).on('scroll resize load', function () {
          var scrolled = $(this).scrollTop();
          // scrolled > 100 ? $('.banner').addClass('scrolled') : $('.banner').removeClass('scrolled');

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
            "background-position-y": jumboPos * 100 + "%",
            "background-position-x": "50%"
          });

        });

        $.fn.extend({
          animateCss: function (animationName, delay) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            var el = this;
            setTimeout(function () {
              $(el).addClass('animated ' + animationName).one(animationEnd, function () {
                // $(this).removeClass('animated ' + animationName);
                $(this).removeClass(animationName);
                $(this).removeClass("will-animate");
                $(this).find('.spantext').addClass('animated rubberBand');
              });
            }, delay);
          }
        });

        $('.will-animate').one('inview', function (event, isInView) {
          if (isInView) {
            var animation = $(this).attr("data-class");
            var delay = $(this).attr("data-delay");
            $(this).animateCss(animation, delay);
          }
        });

        //COUNT UP

        jQuery.fn.countUp = function () {
          var that = this, target = parseInt(jQuery(that).attr("data-value"));
          jQuery({countNum: jQuery(this).text()}).animate({countNum: target}, {
            duration: 1000,
            easing: 'linear',
            step: function () {
              jQuery(that).text(Math.ceil(this.countNum));
            },
            complete: function () {
              jQuery(that).text(Math.ceil(this.countNum));
            }
          });
        };

        if ($('.count-up').length) {
          $('.count-up').text("0");

          $('.count-up').one('inview', function (event, isInView) {
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
          $('.nav-mobile').addClass("open");
          // $('.overlay').css("opacity", "1");
          $('.overlay').fadeIn('fast');
          $('body').css("overflow", "hidden");


          // $.each($(".menu-item"), function(i, el){
          //     setTimeout(function(){
          //         $(el).animateCss('fadeInUp');
          //     },200 + ( i * 100 ));
          // });

        }

        function hideMenu() {
          $('.navbar-toggle').addClass('collapsed');
          $('.nav-mobile').removeClass("open");
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

        $('.overlay').click(function () {
          hideMenu();
        });

        $('.menu-item-has-children').click(function () {
          if($(this).hasClass('collapsed')) {
            $(this).removeClass('collapsed');
          }else{
            $(this).addClass('collapsed');
          }
        });


        $(document).ready(function () {
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

        $(function () {
          $.widget("custom.catcomplete", $.ui.autocomplete, {
            _create: function () {
              this._super();
              this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
            },
            _renderMenu: function (ul, items) {
              var that = this,
                currentCategory = "";
              $.each(items, function (index, item) {
                var li;
                if (item.category !== currentCategory) {
                  ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                  currentCategory = item.category;
                }
                li = that._renderItemData(ul, item);
                if (item.category) {
                  li.attr("aria-label", item.category + " : " + item.label);
                }

              });
            }
          });
          var workdata = [];
          RemoteApi.get_occupations().done(function (data, textStatus, xhrObject) {
            console.log(data);
            // data = $.parseJSON(data);
            // data.sort();

            $.each(data, function (i, categoryitem) {
              console.log(categoryitem.name);
              $.each(categoryitem.occupations, function (x, item) {
                console.log(item.name);
                workdata.push({label: item.name, category: categoryitem.name});
              });
            });
          });

          $("#kompetenser").catcomplete({
            delay: 0,
            source: workdata,
            select: function (event, ui) {
              console.log("Selected: " + ui.item.value + " aka " + ui.item.category);
              $('html, body').animate({
                scrollTop: $(".search-results").offset().top
              }, 500, function () {
                $('.search-results').css({
                  "max-height": "1000px",
                  "padding": "6rem"
                });
                $('#category').text(ui.item.plural);
              });
            }
          });
        });
      }
    },
    'soker_du_personal': {
      init: function () {

      },
      finalize: function () {
        var player;
        var done = false;
        var movieExtended = false;

        function stopVideo() {
          player.stopVideo();
        }



        function setHeightWidth() {
          $('#videoplayer').width($('#youtubeWrapper').width());
          $('#videoplayer').height($('#wrapper').width() / (1920 / 1080));
        }

        function extendMovie() {
          console.log('EXTEND');
          $('#wrapper').addClass("expanded");
          $('#youtubeWrapper').addClass("expanded");
          setHeightWidth();
          movieExtended = true;
          player.playVideo();
          $('html,body').animate({scrollTop: $('#youtubeWrapper').offset().top}, 'slow');

          $(window).on("resize", function () {
            setHeightWidth();
          });
        }

        function contractMovie() {
          console.log('CONTRACT');
          movieExtended = false;
          $('#videoplayer').height(350);
          $('#youtubeWrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
            function (e) {
              console.log('REMOVE CLASSES');
              $('#wrapper').removeClass("expanded");
              $('#youtubeWrapper').removeClass("expanded");
              $('#youtubeWrapper').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
              player.pauseVideo();
            });
        }

        function onPlayerReady(event) {
          player.setPlaybackQuality('hd720');
          player.playVideo();

          $('#middle').on('inview', function (event, isInView) {
            console.log(event);
            if (!isInView && movieExtended) {
              contractMovie();
            }
          });
        }

        function onPlayerStateChange(event) {
          console.log(event);

          if (event.data === 1 && !movieExtended) {
            console.log('PAUSE');
            player.pauseVideo();
            player.setPlaybackQuality('hd720');
          }
        }

        $('#play-btn').click(function () {
          extendMovie();
        });

        if (typeof(YT) === 'undefined' || typeof(YT.Player) === 'undefined') {
          window.onYouTubeIframeAPIReady = function() {
            player = new YT.Player('videoplayer', {
              height: '390',
              width: '640',
              videoId: 'e3cIL-g38OQ',
              events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
              }
            });
          };

          $.getScript('//www.youtube.com/iframe_api');
        } else {

        }
      }
    },
    'soker_du_jobb': {
      init: function () {

      },
      finalize: function () {
        var player;
        var done = false;
        var movieExtended = false;

        function stopVideo() {
          player.stopVideo();
        }



        function setHeightWidth() {
          $('#videoplayer').width($('#youtubeWrapper').width());
          $('#videoplayer').height($('#wrapper').width() / (1920 / 1080));
        }

        function extendMovie() {
          console.log('EXTEND');
          $('#wrapper').addClass("expanded");
          $('#youtubeWrapper').addClass("expanded");
          setHeightWidth();
          movieExtended = true;
          player.playVideo();
          $('html,body').animate({scrollTop: $('#youtubeWrapper').offset().top}, 'slow');

          $(window).on("resize", function () {
            setHeightWidth();
          });
        }

        function contractMovie() {
          console.log('CONTRACT');
          movieExtended = false;
          $('#videoplayer').height(350);
          $('#youtubeWrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
            function (e) {
              console.log('REMOVE CLASSES');
              $('#wrapper').removeClass("expanded");
              $('#youtubeWrapper').removeClass("expanded");
              $('#youtubeWrapper').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
              player.pauseVideo();
            });
        }

        function onPlayerReady(event) {
          player.setPlaybackQuality('hd720');
          player.playVideo();

          $('#middle').on('inview', function (event, isInView) {
            console.log(event);
            if (!isInView && movieExtended) {
              contractMovie();
            }
          });
        }

        function onPlayerStateChange(event) {
          console.log(event);

          if (event.data === 1 && !movieExtended) {
            console.log('PAUSE');
            player.pauseVideo();
            player.setPlaybackQuality('hd720');
          }
        }

        $('#play-btn').click(function () {
          extendMovie();
        });

        if (typeof(YT) === 'undefined' || typeof(YT.Player) === 'undefined') {
          window.onYouTubeIframeAPIReady = function() {
            player = new YT.Player('videoplayer', {
              height: '390',
              width: '640',
              videoId: 'Qdghiqt_AuA',
              events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
              }
            });
          };

          $.getScript('//www.youtube.com/iframe_api');
        } else {

        }
      }
    },
    'registering': {
      init: function () {
        var fb_login = false;
        var active_page = $('.active').attr("id");

        $('body').addClass(active_page);

        $(".slider").slider({
          value: 5,
          min: 0,
          max: 10,
          step: 1,
          slide: function (event, ui) {
            $("#amount").val("$" + ui.value);
            var left_size = 100 - (ui.value * 10);
            var right_size = 100 - left_size;
            $(this).siblings('.left').css("font-size", left_size + 30 + "%");
            $(this).siblings('.right').css("font-size", right_size + 30 + "%");
            console.log(ui.value);
            $('.active').addClass('started');
          }
        });
        $("#amount").val("$" + $("#slider").slider("value"));

        var setUpJobList = function () {
          $(function () {
            $.widget("custom.catcomplete", $.ui.autocomplete, {
              _create: function () {
                this._super();
                this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
              },
              _renderMenu: function (ul, items) {
                var that = this,
                  currentCategory = "";
                $.each(items, function (index, item) {
                  var li;
                  if (item.category !== currentCategory) {
                    ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                    currentCategory = item.category;
                  }
                  li = that._renderItemData(ul, item);
                  if (item.category) {
                    li.attr("aria-label", item.category + " : " + item.label);
                  }

                });
              }
            });
            var workdata = [];
            RemoteApi.get_occupations().done(function (data, textStatus, xhrObject) {
              console.log(data);
              // data = $.parseJSON(data);

              $.each(data, function (i, categoryitem) {
                console.log(categoryitem.name);
                $.each(categoryitem.occupations, function (x, item) {
                  console.log(item.name);
                  workdata.push({label: item.name, category: categoryitem.name});
                });
              });
            });


            $("#occupation").catcomplete({
              delay: 0,
              source: workdata,
              select: function (event, ui) {
                console.log("Selected: " + ui.item.value + " aka " + ui.item.category);
                $('#occupation').text(ui.item);
              }
            });
            $("#occupation2").catcomplete({
              delay: 0,
              source: workdata,
              select: function (event, ui) {
                console.log("Selected: " + ui.item.value + " aka " + ui.item.category);
                $('#occupation2').text(ui.item);
              }
            });
          });
        };


        var gotoNextTab = function () {
          $('.active').addClass('done');
          var next_tab = $('.active').next().attr("id");
          active_page = next_tab;
          // console.log(next_tab+" Active: "+active_tab);
          $('.nav-item a[href="#' + next_tab + '"]').tab('show');
          $('body').removeClass(active_page).addClass(next_tab);
          console.log(active_page);

          switch (active_page) {
            case "page1":
              if (fb_login) {
                user = JSON.parse(sessionStorage.getItem('fbuser'));
              } else {
                // user = JSON.parse(sessionStorage.getItem('user'));
              }

              if (fb_login) {
                $('#firstname').val(fbuser.first_name);
                $('#lastname').val(fbuser.last_name);
                $('#location').val(fbuser.hometown.name);
              }

              break;
            case "page2":
              setUpJobList();
              break;
          }
        };

        var formValidation = function () {
          console.log('Active page: ' + active_page);
          switch (active_page) {
            case "page0":
              console.log("validation page 0");
              $('#register_form_page_0').validate({
                errorPlacement: function (error, element) {
                  error.appendTo(element.parent());
                },
                rules: {
                  cpassword: {
                    equalTo: "#password"
                  }
                },
                // Specify validation error messages
                messages: {
                  password: {
                    required: "Ange ett lösenord"
                  },
                  cpassword: {
                    equalTo: "Lösenorden matchar inte"
                  },
                  email: "Var vänlig skriv en giltig epost-adress",
                  agree: {
                    required: "Du måste godkänna användarvillkoren"
                  },
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function (form) {
                  registerdata = {
                    "email": $('#email').val(),
                    "password": $('#password').val(),
                  };

                  RemoteApi.register_user(registerdata).done(function (data, textStatus, xhrObject) {
                    if (textStatus === 'success') {
                      sessionStorage.setItem('user', registerdata);
                      sessionStorage.setItem('token', JSON.stringify(data));
                      gotoNextTab();
                    }
                  });
                }
              });
              break;

            case "page1":
              console.log("validation page 1");
              $('#register_form_page_1').validate({
                errorPlacement: function (error, element) {
                  error.appendTo(element.parent());
                },
                // Specify validation error messages
                messages: {},
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function (form) {
                  data = {
                    "first_name": $('#firstname').val(),
                    "last_name": $('#lastname').val(),
                    "address": $('#adress').val(),
                    "care_of": $("#co_adress").val(),
                    "zip_code": $("#zipcode").val(),
                    "city": $("#city").val(),
                    "mobile_phone_number": $("#phone").val(),
                    "actively_searching": $('#actively_searching').val()
                  };

                  RemoteApi.update_profile(data, JSON.parse(sessionStorage.getItem('token'))).done(function (data, textStatus, xhrObject) {
                    console.log('update_profile');
                    if (textStatus === 'success') {
                      gotoNextTab();
                    }
                  });
                }
              });

              break;

            case 'page2':

              if ($('#no-jobs').is(':checked')) {
                gotoNextTab();
              } else {
                console.log("validation page 2");
                $('#register_form_page_2').validate({
                  errorPlacement: function (error, element) {
                    error.appendTo(element.parent());
                  },
                  // Specify validation error messages
                  messages: {},
                  submitHandler: function (form) {
                    data = {
                      "employer": $('#employer').val(),
                      "occupation": $('#occupation').val(),
                      "title": $('#title').val(),
                      "start_date": $('#start_date').val(),
                      "end_date": $('#end_date').val(),
                      "current": $('#current').val(),
                      "description": $('#description').val(),
                    };

                    RemoteApi.add_employment(data, JSON.parse(sessionStorage.getItem('token'))).done(function (data, textStatus, xhrObject) {
                      if ($('#employer2').val()) {
                        data2 = {
                          "employer": $('#employer2').val(),
                          "occupation": $('#occupation2').val(),
                          "title": $('#title2').val(),
                          "start_date": $('#start_date2').val(),
                          "end_date": $('#end_date2').val(),
                          "description": $('#description2').val(),
                        };
                        console.log(data2);
                        RemoteApi.add_employment(data2, JSON.parse(sessionStorage.getItem('token'))).done(function (data, textStatus, xhrObject) {
                          if (textStatus === 'success') {
                            gotoNextTab();
                          }
                        });
                      }
                    });


                  }
                });
              }
              break;
          }
        };

        $('#no-jobs').change(function () {
          console.log("changed check");
          if ($(this).is(":checked")) {
            $('input').not('#no-jobs').each(function (index, element) {
              $(this).prop('disabled', true);
            });
            $('textarea').each(function (index, element) {
              $(this).prop('disabled', true);
            });
          } else {
            $('input').each(function (index, element) {
              $(this).prop('disabled', false);
            });
            $('textarea').each(function (index, element) {
              $(this).prop('disabled', false);
            });
          }

        });


        $('a.nav-link').on('click', function () {
          if ($(this).hasClass('done') || $(this).hasClass('started')) {
            return true;
          } else {
            return false;
          }
        });

        $('.next_btn').on('click', function () {
          formValidation();
        });
        $('#register_btn').on('click', function () {
          return false;
        });

        $('li').tooltip();

        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.

        // This function is called when someone finishes with the Login
        // Button.  See the onlogin handler attached to it in the sample
        // code below.

        function testAPI() {
          var fields = {fields: 'email, name, first_name, last_name, birthday, education, gender, hometown, languages, location, website, work'};
          console.log('Welcome!  Fetching your information.... ');
          FB.api('/me', fields, function (response) {
            fb_login = true;
            console.log(response);
            console.log('Successful login for: ' + response.name);

            sessionStorage.setItem('fbuser', JSON.stringify(response));
            data = {
              "email": response.email,
              "password": 'testtest'
            };
            RemoteApi.register_user(data).done(function (data, textStatus, xhrObject) {
              if (textStatus === 'success') {
                gotoNextTab();
              }
            });
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
            FB.login(function (response) {
              testAPI();
            });

          } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            FB.login(function (response) {
              testAPI();
            }, {
              scope: 'public_profile,email,user_birthday,user_location, user_education_history, user_hometown, user_website, user_work_history',
              return_scopes: true
            });
          }
        }

        function checkLoginState() {
          FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
          });
        }

        window.fbAsyncInit = function () {
          FB.init({
            appId: '328788464164283',
            cookie: true,  // enable cookies to allow the server to access
                           // the session
            xfbml: true,  // parse social plugins on this page
            version: 'v2.8' // use graph api version 2.8
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

          FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
              FB.logout();
            }
          });

        };

        // Load the SDK asynchronously
        (function (d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {
            return;
          }
          js = d.createElement(s);
          js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        $('#fb_login').on('click', function () {
          checkLoginState();
        });

        function getProfileData() {
          IN.API.Profile("me").fields("id,firstName,lastName,email-address,picture-urls::(original),public-profile-url,location:(name)").result(function (me) {
            var profile = me.values[0];
            var id = profile.id;
            var firstName = profile.firstName;
            var lastName = profile.lastName;
            var emailAddress = profile.emailAddress;
            var pictureUrl = profile.pictureUrls.values[0];
            var profileUrl = profile.publicProfileUrl;
            var country = profile.location.name;
            console.log(profile);
          });
        }

        $('#li_login').on('click', function () {
          console.log("Linkedin");
          IN.UI.Authorize().params({"scope": ["r_basicprofile", "r_emailaddress"]}).place();
          IN.Event.on(IN, 'auth', getProfileData);
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

var User = (function () {
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
