jQuery('document').ready(function($) {
    $('#maxkomp_page_title, #front_title').on("change load", function() {

        var titleString = $('#maxkomp_page_title, #front_title').val();

        var selectValues = titleString.split(" ");
        console.log(titleString);
        console.log(selectValues);
        $('#maxkomp_page_textorange_select, #textorange_select')
            .find('option')
            .remove()
            .end();
        $.each(selectValues, function(key, value) {
            $('#maxkomp_page_textorange_select, #textorange_select')
                .append($('<option>', { value : key })
                    .text(value));
        });
    });
});