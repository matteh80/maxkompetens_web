jQuery('document').ready(function($) {
    $('#maxkomp_page_title').on("change load", function() {

        var titleString = $('#maxkomp_page_title').val();

        var selectValues = titleString.split(" ");
        console.log(titleString);
        console.log(selectValues);
        $('#maxkomp_page_textorange_select')
            .find('option')
            .remove()
            .end();
        $.each(selectValues, function(key, value) {
            $('#maxkomp_page_textorange_select')
                .append($('<option>', { value : key })
                    .text(value));
        });
    });
});