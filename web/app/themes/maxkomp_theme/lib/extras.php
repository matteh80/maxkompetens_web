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

function wpb_change_title_text( $title ){
    $screen = get_current_screen();

    switch ($screen->post_type) {
        case 'medarbetare':
            $title = 'Förnamn Efternamn';
            break;
        case 'office':
            $title = 'Stad (ex. Stockholm)';
            break;
    }

    return $title;
}

add_filter( 'enter_title_here', __NAMESPACE__ . '\\wpb_change_title_text' );

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

function new_excerpt_more($more) {
    global $post;
    return '...';
}
add_filter('excerpt_more',  __NAMESPACE__ . '\\new_excerpt_more');

function XML2JSON($xml) {

    function normalizeSimpleXML($obj, &$result) {
        $data = $obj;
        if (is_object($data)) {
            $data = get_object_vars($data);
        }
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $res = null;
                normalizeSimpleXML($value, $res);
                if (($key == '@attributes') && ($key)) {
                    $result = $res;
                } else {
                    $result[$key] = $res;
                }
            }
        } else {
            $result = $data;
        }
    }
    normalizeSimpleXML(simplexml_load_string($xml), $result);
    return json_encode($result);
}

add_filter('XML2JSON',  __NAMESPACE__ . '\\XML2JSON');

function fb_opengraph() {
    global $post;

    if (isset($_GET['jaid'])) {
        $key = $_GET['jaid'];
    }

    $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
    $map_url = "https://cv-maxkompetens.app.intelliplan.eu/JobAdGlobePages/Feed.aspx?pid=AA31EA47-FDA6-42F3-BD9F-E42186E5A960&version=2&JobAdId=".$key;
    $xml = file_get_contents($map_url, false, $context);
    $xml = simplexml_load_string($xml);
    $arr = (array) $xml -> xpath('channel');
    $item = $arr[0]->item;

    $item = json_encode($item);
    $item = json_decode($item);



    if(is_page('jobs')) {
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        $title = $item->title;
        $description = strip_tags($item->description);
        ?>

        <meta property="og:title" content="<?php echo $title; ?>"/>
        <meta property="og:description" content="<?php echo $description; ?>"/>
<!--        <meta property="og:type" content="article"/>-->
        <meta property="og:url" content="<?php echo the_permalink() . '?jaid='.$key; ?>"/>
        <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>

        <?php
    } else {
        return;
    }
}
add_action('wp_head',  __NAMESPACE__ . '\\fb_opengraph', 5);
