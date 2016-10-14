<?php
namespace Roots\Sage\CMBExtras;

/**
 * Gets the title and return an array of the words
 * @param  integer $postid
 * @return array             An array of words from the title string
 */
function cmb2_get_post_title_array( ) {
    if(isset($_GET['post'])) {
        $postid = $_GET['post'];
        $title = get_post_meta($postid, 'maxkomp_page_title', true);
    }else{
        $postid = -1;
        $title = maxkomp_get_option( 'front_title' );
    }
    $array = explode(" ", $title);
    return $array;
}

/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function cmb2_get_post_options( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'page',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ) );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->ID ] = $post->post_title;
        }
    }

    return $post_options;
}

