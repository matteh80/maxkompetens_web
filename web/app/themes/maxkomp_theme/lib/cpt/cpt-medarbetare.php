<?php
// let's create the function for the custom type
function custom_post_medarbetare() {
    // creating (registering) the custom type
    register_post_type( 'medarbetare', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array( 'labels' => array(
            'name' => __( 'Medarbetare', 'sage' ), /* This is the Title of the Group */
            'singular_name' => __( 'Medarbetare', 'sage' ), /* This is the individual type */
            'all_items' => __( 'All Medarbetare', 'sage' ), /* the all items menu item */
            'add_new' => __( 'Add New', 'sage' ), /* The add new menu item */
            'add_new_item' => __( 'Add New Medarbetare', 'sage' ), /* Add New Display Title */
            'edit' => __( 'Edit', 'sage' ), /* Edit Dialog */
            'edit_item' => __( 'Edit Medarbetare', 'sage' ), /* Edit Display Title */
            'new_item' => __( 'New Medarbetare', 'sage' ), /* New Display Title */
            'view_item' => __( 'View Medarbetare', 'sage' ), /* View Display Title */
            'search_items' => __( 'Search Medarbetare', 'sage' ), /* Search Custom Type Title */
            'not_found' =>  __( 'Nothing found in the Database.', 'sage' ), /* This displays if there are no entries yet */
            'not_found_in_trash' => __( 'Nothing found in Trash', 'sage' ), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ), /* end of arrays */
            'description' => __( 'Medarbetare', 'sage' ), /* Custom Type Description */
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 20, /* this is what order you want it to appear in on the left hand side menu */
            'menu_icon' => 'dashicons-universal-access', /* the icon for the custom post type menu */
            'rewrite'	=> array( 'slug' => 'medarbetare', 'with_front' => false ), /* you can specify its url slug */
            'has_archive' => false, /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'thumbnail')
        ) /* end of options */
    ); /* end of register post type */

    /* this adds your post categories to your custom post type */
    //register_taxonomy_for_object_type( 'category', 'faq' );
    /* this adds your post tags to your custom post type */
//    register_taxonomy_for_object_type( 'post_tag', 'faq' );

}

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_medarbetare');

?>