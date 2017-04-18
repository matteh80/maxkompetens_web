<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function modifyTitleWithOrangeWord($title, $pos) {
    if($title == "") {
        global $post;
        return $post->post_title;
    }else{
        $array = explode(" ", $title);
        $titleLength = count($array);
//        debug_to_console($titleLength." ".$pos);
        if($pos < $titleLength) {
            $word = $array[$pos];
        }else{
            if($pos == $titleLength) {
                $word = 'NOWORD';
            }else{
                $word = $title;
            }
        }
//        debug_to_console($word);
        if (strpos($title, $word) !== false) {
            return str_replace($word, '<span class="text-orange spantext">'.$word.'</span>', $title);
        }else{
            return $title;
        }
    }

}

function getRelativeUploadPath($string) {
    $findme   = '/app';
    $pos = strpos($string, $findme);
    return substr($string, $pos);
}

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
