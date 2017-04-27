<?php
class Custom_Menu_Walker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-wrap'><div class='container'><ul class='sub-menu row'>\n";
    }

    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        if($depth > 0) {
            $output .= "<li class='col-4 " .  implode(" ", $item->classes) . "'>";
        }else{
            $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        }


        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $title;
        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }
        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div></div>\n";
    }
}
?>