<?php
function fancy_button_func( $atts ) {
    $a = shortcode_atts( array(
        'color' => 'orange',
        'url' => '#',
        'text' => 'Click me',
        'size' => '4',
    ), $atts );

    $offset = (12 - $a['size']) / 2;

    $html = '
                    <div class="fancy-button btn-'.$a['color'].'">
                        <div class="left-frills frills"></div>
                        <a href="'.$a['url'].'" class="button">'.$a['text'].'</a>
                        <div class="right-frills frills"></div>
                    </div>
          
           
            ';

    return $html;
}
add_shortcode( 'fancy_button', 'fancy_button_func' );

add_action( 'init', 'wptuts_buttons' );
function wptuts_buttons() {
    add_filter( "mce_external_plugins", "wptuts_add_buttons" );
    add_filter( 'mce_buttons', 'wptuts_register_buttons' );
}

function wptuts_add_buttons( $plugin_array ) {
    $plugin_array['wptuts'] = get_template_directory_uri() . '/lib/tinymce_fancy_button/plugin/fancy_button_plugin.js';
    return $plugin_array;
}
function wptuts_register_buttons( $buttons ) {
    array_push( $buttons, 'fancy_button' );
    return $buttons;
}

?>