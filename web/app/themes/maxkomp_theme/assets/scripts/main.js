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

                // $(window).on("scroll resize", function() {
                //     $('section').each(function(index, element) {
                //         if($(element).offset().top <= 0 && !$(element).hasClass("fixed")) {
                //             $(element).addClass("fixed");
                //             console.log($(this).offset());
                //             console.log(index);
                //         }
                //     });
                // });

                $(window).on('scroll resize', function() {
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

                    // $('.menu-item').each(function(index) {
                    //     $(this).animateCss('flipInY', 2000);
                    // });

                    $.each($(".menu-item"), function(i, el){
                        setTimeout(function(){
                            $(el).animateCss('flipInX');
                        },200 + ( i * 100 ));
                    });

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
        'about_us': {
            init: function () {
                // JavaScript to be fired on the about us page
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
