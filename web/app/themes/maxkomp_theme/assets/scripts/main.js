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
        $('.content-page').css("min-height", $(window).height() - $('.jumbo').height());

        // $('a').click(function(e) {
        //   if($(this).attr('href')) {
        //
        //   }
        // })

        $('a[href^="#"]').click(function(e) {
          var anchor_id = $(this).attr("href");

          if(anchor_id.length > 1) {
            e.preventDefault();

            var tag = $(anchor_id);
            $('html,body').animate({scrollTop: tag.offset().top},'slow');
          }
        });

        $(".fancy-button").mousedown(function(){
          $(this).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(){
            $(this).removeClass('active');
          });
          $(this).addClass("active");
        });

        $('input:not(:checkbox), textarea, select').not('#kompetenser').each(function (e, i) {
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

        $(window).on('load scroll resize', function() {
          $('.wrap').css('margin-bottom',$('.content-info').outerHeight());
        });


        // $(window).on("scroll resize", function() {
        //     $('section').each(function(index, element) {
        //         if($(element).offset().top <= 0 && !$(element).hasClass("fixed")) {
        //             $(element).addClass("fixed");
        //             console.log($(this).offset());
        //             console.log(index);
        //         }
        //     });
        // });

        // $(window).on('scroll resize load', function () {
        //   var scrolled = $(this).scrollTop();
        //   // scrolled > 100 ? $('.banner').addClass('scrolled') : $('.banner').removeClass('scrolled');
        //
        //   // $('section').filter(function() {
        //   //     return scrolled >= $(this).offset().top;
        //   // }).addClass('fixed').next().css({
        //   //     "margin-top" : $(this).outerHeight()
        //   // });
        //
        //   // $('section').each(function(index, element) {
        //   //     if(scrolled >= $(element).offset().top && !$(element).hasClass("fixed")) {
        //   //         $(element).next().css("top", $(element).height());
        //   //         $(element).addClass("fixed").css("top", 0);
        //   //
        //   //     }
        //   // });
        //
        //   elHeight = $('.jumbo').outerHeight();
        //   offset = $('.jumbo').offsetTop;
        //
        //   jumboPos = (scrolled / elHeight);
        //
        //   $('.jumbo').css({
        //     "background-position-y": jumboPos * 100 + "%",
        //     "background-position-x": "50%"
        //   });
        //
        // });

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

        var crash = 0;
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('.paper-plane').click(function() {

          crash++;
          console.log(crash);
          if(crash > 4) {
            $(this).animateCss("bounceOutDown", 0);
            $(this).one(animationEnd, function() {
              crash = 0;
              $(this).hide();
              setTimeout(function() {
                $(this).animateCss("slideInRight", 0);
                $(this).show('300');
              },2000);

            });

          }else{
            $(this).animateCss("jello", 0);
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
    //Vilka är vi
    'vilka_ar_vi': {
      init: function () {


        function setHeights() {
          $('.service-content').each(function(i,e) {
            $(this).attr("data-height", $(this).children('div').outerHeight());
            $(this).attr("data-minimize", $(this).children('p').outerHeight());
            $(this).css("height", $(this).children('p').outerHeight());
            $(this).children('div').css('visibility', 'hidden');
          });
        }

        setHeights();

        $(window).on("resize", function() {
           setHeights();
        });

        $('.services-button').click(function(e) {
          e.preventDefault();
          var id = $(this).attr('id');
          var $content = $('#content'+id);
          var $contentWrapper = $content.children('div');
          var $excerpt = $content.children('p');
          var $button = $(this);

          if($content.hasClass('collapsed')) {

            $excerpt.css('visibility', 'hidden');
            $contentWrapper.css('visibility', 'visible');
            $content.css({
              'height': $content.attr('data-height')
            });
            $content.removeClass('collapsed');
            $button.children('span').text('Minimera');
            $button.parent().removeClass('btn-green').addClass('btn-orange');
            $content.off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');

          }else{
            $content.css({
              'height': $content.attr('data-minimize')
            });
            $content.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
              function (e) {
                $contentWrapper.css('visibility', 'hidden');
                $excerpt.css('visibility', 'visible');
                $content.addClass('collapsed');
                $button.children('span').text('Läs mer');
                $button.parent().removeClass('btn-orange').addClass('btn-green');
                $content.off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
              }
            );
          }
        });
      },
      finalize: function () {

      }
    },
    // Kontakt
    'kontakt': {
      init: function () {

        var $officeitems = $('.office-item');

        $officeitems.each(function(index, Element) {
          var $textbox = $(Element).find('.textbox');
          var mMap = $(Element).find('.map')[0];
          var myOptions = {
            'zoom': 14,
            'mapTypeId': google.maps.MapTypeId.ROADMAP
          };
          var map;
          var geocoder;
          var marker;
          var infowindow;
          var address = $textbox.find('.address1').text() + ', ' + $textbox.find('.city').text() + ', ' + $textbox.find('.zip').text() + ', ' + $textbox.find('.country').text();

          geocoder = new google.maps.Geocoder();
          geocoder.geocode({'address': address}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
              myOptions.center = results[0].geometry.location;
              map = new google.maps.Map(mMap, myOptions);
              marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
              });
            } else {
              // alert('The address could not be found for the following reason: ' + status);
            }
          });
        });
      },
      finalize: function () {

        $("#contact_form").validate({
          messages: {
            name: "Skriv in ditt namn",
            email: {
              required: "Vi behöver din epost för att kunna kontakta dig",
              email: "Ange en giltig epost-adress"
            },
            foretag: "Skriv in vilket företag du företräder",
            kontaktperson: "Detta fält krävs",
            message: "Du måste skriva ett meddelande"
          }
        });
        $('#send_mail').click(function(e) {
          // var response = grecaptcha.getResponse();
          // console.log(response);
          var $this = $(this);

          // $.get('https://www.google.com/recaptcha/api/siteverify', {
          //
          // });

          if($("#contact_form").valid()){   // test for validity
            // do stuff if form is valid
            $this.html($this.attr('data-loading-text')).prop('disabled', true);

            var message = $('#message').val() + '<hr><p>'+ $('#name').val()+ ' (' + $('#email').val() +')</p>';

            $.ajax({
              type: 'POST',
              url: 'https://mandrillapp.com/api/1.0/messages/send.json',
              data: {
                'key': 'HqeQyBuKFGBqhUUyUTssWw',
                'message': {
                  'from_email': 'hemsidan@maxkompetens.se',
                  "from_name": $('#name').val(),
                  'to': [
                    {
                      'email': 'sverige@maxkompetens.se',
                      'type': 'to'
                    },
                  ],
                  "headers": {
                    "Reply-To": $('#email').val()
                  },
                  'autotext': 'true',
                  'subject': 'Nytt mail från maxkompetens.se',
                  'html': message.replace(/\r?\n/g, '<br />')
                }
              }
            }).done(function(response) {
              console.log(response[0].status); // if you're into that sorta thing
              if(response[0].status === 'rejected') {
                $('#email_error').slideDown();
              }else{
                $('#email_sent').slideDown();
                $('#contact_form input, #contact_form textarea').each(function(index, element) {
                  $(this).val('');
                });
              }
              $this.html('Skicka').prop('disabled', false);
            });
          } else {
            // do stuff if form is not valid

          }
        });
      }
    },
    // Bemanning
    'bemanning': {
      init: function () {
        $("#contact_form").validate({
          messages: {
            name: "Skriv in ditt namn",
            email: {
              required: "Vi behöver din epost för att kunna kontakta dig",
              email: "Ange en giltig epost-adress"
            },
            foretag: "Skriv in vilket företag du företräder",
            kontaktperson: "Detta fält krävs",
            message: "Du måste skriva ett meddelande"
          }
        });
        $('#send_mail').click(function(e) {
          var $this = $(this);

          if($("#contact_form").valid()){   // test for validity
            // do stuff if form is valid
            $this.html($this.attr('data-loading-text')).prop('disabled', true);

            var message = $('#message').val() + '<hr><p>Företag: ' + $('#foretag').val() +
              '</p><p>Kontaktperson: '+ $('#kontaktperson').val() + ' ('+ $('#email').val() + ')</p>';

            $.ajax({
              type: 'POST',
              url: 'https://mandrillapp.com/api/1.0/messages/send.json',
              data: {
                'key': 'HqeQyBuKFGBqhUUyUTssWw',
                'message': {
                  'from_email': 'hemsidan@maxkompetens.se',
                  "from_name": $('#kontaktperson').val(),
                  'to': [
                    {
                      'email': 'sverige@maxkompetens.se',
                      'name': 'RECIPIENT NAME (OPTIONAL)',
                      'type': 'to'
                    },
                  ],
                  "headers": {
                    "Reply-To": $('#email').val()
                  },
                  'autotext': 'true',
                  'subject': 'Nytt mail från maxkompetens.se',
                  'html': message.replace(/\r?\n/g, '<br />')
                }
              }
            }).done(function(response) {
              console.log(response[0].status); // if you're into that sorta thing
              if(response[0].status === 'rejected') {
                $('#email_error').slideDown();
              }else{
                $('#email_sent').slideDown();
                $('#contact_form input, #contact_form textarea').each(function(index, element) {
                  $(this).val('');
                });
              }
              $this.html('Skicka').prop('disabled', false);
            });
          } else {
            // do stuff if form is not valid

          }
        });
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
          RemoteApi.get_occupations({token: '2905ed3bc66810dd6be2b1d5403679b4fd4de5bb'}).done(function (data, textStatus, xhrObject) {
            console.log(data);
            // data = $.parseJSON(data);
            // data.sort();

            $.each(data, function (i, categoryitem) {
              // console.log(categoryitem.name);
              $.each(categoryitem.occupations, function (x, item) {
                // console.log(item.name);
                workdata.push({label: item.name, category: categoryitem.name});
              });
            });
            console.log(workdata);
          }).error(function(message) {
            var treeData;

            var retrieveURL = function(filename) {
              var scripts = document.getElementsByTagName('script');
              if (scripts && scripts.length > 0) {
                for (var i in scripts) {
                  if (scripts[i].src && scripts[i].src.match(new RegExp(filename+'\\.js$'))) {
                    return scripts[i].src.replace(new RegExp('(.*)'+filename+'\\.js$'), '$1');
                  }
                }
              }
            };

            function reqListener(e) {
              var mArray = JSON.parse(this.responseText);
              console.log(mArray);
              $.each(mArray, function (i, categoryitem) {
                // console.log(categoryitem.name);
                $.each(categoryitem, function (x, item) {
                  // console.log(item.name);
                  workdata.push({label: item, category: categoryitem[i]});
                });
              });
              console.log(workdata);
            }

            var oReq = new XMLHttpRequest();
            oReq.onload = reqListener;
            oReq.open("get", retrieveURL('main')+"jobb.json", true);
            oReq.send();


          });

          $("#kompetenser").catcomplete({
            delay: 0,
            source: workdata,
            select: function (event, ui) {
              console.log("Selected: " + ui.item.value + " aka " + ui.item.category);
              $('.search-results').css({
                "max-height": "1000px",
                "padding": "6rem"
              });
              $('#category').text(ui.item.value.toLowerCase());
              $('html, body').animate({
                scrollTop: $(".jumbo").height()
              }, 500, function () {
                target = Math.floor(Math.random() * 35) + 20;
                jQuery({countNum: jQuery('.numCandidates').text()}).animate({countNum: target}, {
                  duration: 2000,
                  easing: 'linear',
                  step: function () {
                    jQuery('.numCandidates').text(Math.ceil(this.countNum)+" ");
                  },
                  complete: function () {
                    jQuery('.numCandidates').text(Math.ceil(this.countNum)+" ");
                  }
                });
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
    'jobs': {
      init: function () {

      },
      finalize: function () {

      }
    },
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
