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

/**
 * Metabox for Page Slug
 * @author Tom Morton
 * @link https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function be_metabox_show_on_slug( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
        return $display;
    }

    if ( 'slug' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return $display;
    }

    $slug = get_post( $post_id )->post_name;

    // See if there's a match
    return in_array( $slug, (array) $meta_box['show_on']['value']);
}
add_filter( 'cmb2_show_on', __NAMESPACE__ . '\\be_metabox_show_on_slug', 10, 2 );

/**
 * Hide Metabox for Page Slug
 * @link https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function be_metabox_hide_on_slug( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
        return $display;
    }

    if ( 'hideslug' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return $display;
    }

    $slug = get_post( $post_id )->post_name;

    // See if there's a match
    return !in_array( $slug, (array) $meta_box['show_on']['value']);
}
add_filter( 'cmb2_show_on', __NAMESPACE__ . '\\be_metabox_hide_on_slug', 10, 2 );
