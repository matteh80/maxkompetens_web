var LogoSlider = (function($) {
// DECLARING VARIABLES FOR EASIER CALLING
    var slideshow = $('#slideshow'),
        main = $('#slideouter'),
        actions = $('#actions'),
        next = $('#next'),
        previous = $('#prev'),
        index = 0,
        offset = 0,
        activeImage,
        thisWidth;

    var slider = function(options) {
        //THE DEFAULT SETTINGS FOR THE SLIDESHOW
        var defaults = {
            el: $('#slideshow'),
            speed: 2000,
            actions: true,
            width: '100%',
            height: 120
        };

        //EXTEND THE SETTINGS SO USER MAY CUSTOMIZE
        var settings = $.extend(defaults, options);

        //CHANGE THE SIZE OF THE SLIDESHOW
        //TO THE SIZE USER DECLARED IN SETTINGS
        main.css({
            "height": settings.height,
            "width": settings.width
        });

        function animation(action) {
            //IF USER CLICKS ON NEXT LINK
            if(action === "next") {
                activeImage = $('.slideimage').first();
                offset -= $(activeImage).outerWidth(true);
                thisWidth = $(activeImage).outerWidth(true);
                // console.log("Offset: "+offset);

                //HIDE THE FIRST SLIDE
                $(activeImage).animate({
                    marginLeft: -thisWidth
                }, settings.speed, function() {
                    $('.slideimage').first().css("margin-left", "0").remove().appendTo(slideshow).show();
                });

            } else {

                activeImage = $('.slideimage').first();
                offset -= $(activeImage).outerWidth(true);
                thisWidth = $(activeImage).outerWidth(true);
                // console.log("Offset: "+offset);

                //HIDE THE FIRST SLIDE
                $(activeImage).animate({
                    marginLeft: thisWidth
                }, settings.speed, function() {
                    $('.slideimage').first().css("margin-left", "0").remove().appendTo(slideshow).show();
                });

                //HIDE THE LAST SLIDE
                // $('li:last').css({"height":"0","opacity":"0"});
                // //REMOVE THE LAST SLIDE AND PREPEND
                // //AS THE FIRST SLIDE
                // $('li:last').remove().prependTo(slideshow);
                // //ANIMATE AND SHOW THE SLIDE
                // $('li:first').animate({
                //     height: settings.height,
                //     opacity: 1
                // }, settings.speed);
            }

        }

        function init() {
            var slideshow_width = 0;

            $('.slideimage').on("load", function() {
                // console.log($(this).width());
                slideshow_width += $(this).outerWidth(true);
                slideshow.css({
                    width: slideshow_width*2,
                    // marginLeft: -$('.slideimage').first().outerWidth(true)
                });
            });

            setInterval(function() {
                animation("next");
            }, settings.speed);
        }

        init();



        // ONCLICK EVENT FOR NEXT SLIDE LINKS
        next.click(function() {
            animation('next');
            return false;
        });
        // ONCLICK EVENT FOR NEXT SLIDE LINKS
        previous.click(function() {
            animation('previous');
            return false;
        });

        //HIDE AND SHOW THE LINKS IF ACTIONS IS TRUE
        if(settings.actions) {
            actions.css({"opacity":"0"});
            // MOUSE ENTER EVENT FOR ACTIONS TO APPEAR AND DISAPPEAR
            main.mouseenter(function() {
                actions.stop().animate({
                    opacity: 1
                }, 'fast');
            }).mouseleave(function() {
                actions.stop().animate({
                    opacity: 0
                }, 'fast');
            });
        }
    };

    return {
        slider: slider,
    };
})(jQuery);
