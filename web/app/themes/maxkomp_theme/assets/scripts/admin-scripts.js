(function ($) {
    $('#refresh_job').click(function(e) {
        e.preventDefault();
        console.log('clicked');
        $.ajax({
            url: ajaxurl.ajaxurl,
            data: {
                action: 'import_jobs'
            },
            beforeSend: function() {
                $('#refresh_job').attr("disabled", true);
                $('#job-spinner').css("visibility", "visible");
            },
            success: function( result ) {
                console.log( result );
                $('#refresh_job').attr("disabled", false);
                $('#job-spinner').css("visibility", "hidden");
            }
        });

    });

})(jQuery);