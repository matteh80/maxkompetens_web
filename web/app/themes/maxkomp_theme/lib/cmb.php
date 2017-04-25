<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'maxkomp_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


function maxkomp_hide_if_profil( $cmb ) {
	if($cmb->object_id !== 113) {
		return true;
	}else{
		return false;
	}

}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function maxkomp_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function maxkomp_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object
 */
function maxkomp_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo $classes; ?>">
		<p><label for="<?php echo $id; ?>"><?php echo $label; ?></label></p>
		<p><input id="<?php echo $id; ?>" type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo $description; ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object
 */
function maxkomp_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo $field->row_classes(); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo $field->args( 'description' ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function maxkomp_before_row_if_2( $field_args, $field ) {
	if ( 29 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

//add_action( 'cmb2_admin_init', 'maxkomp_register_customers_metabox');
/**
 * Hook in and add a customers metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
//function maxkomp_register_customers_metabox() {
//
//}



add_action( 'cmb2_admin_init', 'maxkomp_register_page_metabox' );
/**
 * Hook in and add a page metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function maxkomp_register_page_metabox() {
	$prefix = 'maxkomp_page_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_page = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		 'show_on_cb' => 'maxkomp_hide_if_profil', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'maxkomp_add_some_classes', // Add classes through a callback.
	) );

    $cmb_page->add_field( array(
        'name'             => esc_html__( 'Logo Selection', 'cmb2' ),
        'id'               => $prefix . 'logo_selection',
        'type'             => 'radio_inline',
        'default'          => 'primary',
        'options'          => array(
            'primary' => esc_html__( 'Primary', 'cmb2' ),
            'secondary'   => esc_html__( 'Secondary', 'cmb2' ),
        ),
    ) );

	$cmb_page->add_field( array(
		'name'       => esc_html__( 'Title Text', 'cmb2' ),
		'desc'       => esc_html__( 'The text shown in header', 'cmb2' ),
		'id'         => $prefix . 'title',
		'type'       => 'text',
//		'show_on_cb' => 'maxkomp_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
		// 'column'          => true, // Display field value in the admin post-listing columns
	) );

	$cmb_page->add_field( array(
		'name'       => __( 'Orange word', 'cmb2' ),
		'desc'       => __( 'The word in the title that will be orange', 'cmb2' ),
		'id'         => $prefix . 'textorange_select',
		'type'       => 'select',
		'options'    => \Roots\Sage\CMBExtras\cmb2_get_post_title_array(),
	) );

//	$cmb_page->add_field( array(
//			'name' => 'Address',
//			'desc' => 'Custom Address Field',
//			'id'   => '_cmb2_person_address',
//			'type' => 'address',
//	) );

//	$cmb_page->add_field( array(
//		'name' => esc_html__( 'Header text', 'cmb2' ),
////		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
//		'id'   => $prefix . 'text',
//		'type' => 'textarea',
//	) );

    $cmb_page->add_field( array(
        'name'    => 'Header text',
        'id'      => $prefix . 'headertext',
        'type'    => 'wysiwyg',
        'options' => array(
            'wpautop' => false, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        ),
    ) );

	$cmb_page->add_field( array(
		'name'    => esc_html__( 'Text Color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose color for the header text (default #424242)', 'cmb2' ),
		'id'      => $prefix . 'colorpicker',
		'type'    => 'colorpicker',
		'default' => '#424242',
		// 'attributes' => array(
		// 	'data-colorpicker' => json_encode( array(
		// 		'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
		// 	) ),
		// ),
	) );
}

add_action( 'cmb2_admin_init', 'maxkomp_register_customers_metabox' );
/**
 * Hook in and add a page metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function maxkomp_register_customers_metabox() {
	$prefix = 'maxkomp_customer_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_customer = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( '&nbsp;', 'cmb2' ),
		'object_types'  => array( 'customer', ), // Post type
		// 'show_on_cb' => 'maxkomp_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'maxkomp_add_some_classes', // Add classes through a callback.
	) );

	$cmb_customer->add_field( array(
		'name' => esc_html__( 'Info', 'cmb2' ),
//		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textarea',
		'type' => 'textarea',
	) );

	$cmb_customer->add_field( array(
		'name' => esc_html__( 'Test Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb_customer->add_field( array(
		'name' => esc_html__( 'Reference Case', 'cmb2' ),
		'desc' => esc_html__( 'Check if this is a reference case', 'cmb2' ),
		'id'   => $prefix . 'reference_case',
		'type' => 'checkbox',
	) );
}

add_action( 'cmb2_admin_init', 'maxkomp_register_medarbetare_metabox' );

function maxkomp_register_medarbetare_metabox() {
    $prefix = 'maxkomp_medarbetare_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_medarbetare = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__( '&nbsp;', 'cmb2' ),
        'object_types'  => array( 'medarbetare', ), // Post type
        // 'show_on_cb' => 'maxkomp_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'maxkomp_add_some_classes', // Add classes through a callback.
    ) );

    $cmb_medarbetare->add_field( array(
        'name' => esc_html__( 'Works as', 'cmb2' ),
//		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'works_as',
        'type' => 'text',
    ) );

    $cmb_medarbetare->add_field( array(
        'name' => esc_html__( 'Email', 'cmb2' ),
//		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'email',
        'type' => 'text_email',
    ) );

    $cmb_medarbetare->add_field( array(
        'name' => esc_html__( 'Phone', 'cmb2' ),
//		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'phone',
        'type' => 'text',
    ) );

    $cmb_medarbetare->add_field( array(
        'name'             => esc_html__( 'Kontor', 'cmb2' ),
//        'desc'             => esc_html__( 'Select the page to link to', 'cmb2' ),
        'id'               => $prefix . 'office',
        'type'             => 'select',
        'show_option_none' => false,
        'options'          => \Roots\Sage\CMBExtras\cmb2_get_post_options(array('post_type' => 'office', 'numberposts' => -1, 'order_by' => 'title')),
    ) );
}

add_action( 'cmb2_admin_init', 'maxkomp_register_offices_metabox' );
/**
 * Hook in and add a page metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function maxkomp_register_offices_metabox() {
    $prefix = 'maxkomp_office_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_office = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__( '&nbsp;', 'cmb2' ),
        'object_types'  => array( 'office', ), // Post type
        // 'show_on_cb' => 'maxkomp_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'maxkomp_add_some_classes', // Add classes through a callback.
    ) );

    $cmb_office->add_field( array(
        'name' => esc_html__( 'Email', 'cmb2' ),
//		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'email',
        'type' => 'text_email',
    ) );

    $cmb_office->add_field( array(
        'name' => esc_html__( 'Phone', 'cmb2' ),
//		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'phone',
        'type' => 'text',
    ) );

    $cmb_office->add_field( array(
        'name' => esc_html__( 'Adress', 'cmb2' ),
//		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'address',
        'type' => 'address',
    ) );
}



add_action( 'cmb2_admin_init', 'maxkomp_register_repeatable_group_field_metabox' );

/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function maxkomp_register_repeatable_group_field_metabox() {
	$prefix = 'maxkomp_buttons_group_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_page_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Buttons', 'cmb2' ),
		'object_types' => array( 'page' ),
		'show_on'	=> array( 'key' => 'hideslug', 'value' => "profil"),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_page_group->add_field( array(
		'id'          => $prefix . 'buttons',
		'type'        => 'group',
//		'description' => esc_html__( 'Generates reusable form entries', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Button {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Button', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Button', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_page_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Button Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_page_group->add_group_field( $group_field_id, array(
		'name'             => esc_html__( 'Link', 'cmb2' ),
		'desc'             => esc_html__( 'Select the page to link to', 'cmb2' ),
		'id'               => 'button_link',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => \Roots\Sage\CMBExtras\cmb2_get_post_options(array('post_type' => 'page', 'numberposts' => -1, 'order_by' => 'title')),
	) );

    $cmb_page_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'External link', 'cmb2' ),
        'id'         => 'ext_link',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

	$prefix = 'maxkomp_profile_group_';
	/**
	 * Repeatable Field Groups for Profile
	 */
	$cmb_page_profile_group = new_cmb2_box( array(
		'id'           => $prefix . 'profile_metabox',
		'title'        => esc_html__( 'Sliders', 'cmb2' ),
		'object_types' => array( 'page' ),
//		'show_on'	=> array( 'key' => 'page-template', 'value' => "template-profil.php")
		'show_on'	=> array( 'key' => 'slug', 'value' => "profil"),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$profil_group_field_id = $cmb_page_profile_group->add_field( array(
		'id'          => $prefix . 'sliders',
		'type'        => 'group',
//		'description' => esc_html__( 'Generates reusable form entries', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Button {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Button', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Button', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_page_profile_group->add_group_field( $profil_group_field_id, array(
		'name'       => esc_html__( 'Slider Title', 'cmb2' ),
		'id'         => 'slider_title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_page_profile_group->add_group_field( $profil_group_field_id, array(
		'name'       => esc_html__( 'Slider Text', 'cmb2' ),
		'id'         => 'slider_text',
		'type'       => 'textarea_small',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_page_profile_group->add_group_field( $profil_group_field_id, array(
		'name' => esc_html__( 'Background', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => 'bg',
		'type' => 'file',
	));

	$cmb_page_profile_group->add_group_field( $profil_group_field_id, array(
			'name' => esc_html__( 'Icon', 'cmb2' ),
			'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
			'id'   => 'icon',
			'type' => 'file',
	));

	$cmb_page_profile_group->add_group_field( $profil_group_field_id, array(
		'name'    => __( 'Color Picker', 'maxkomp' ),
		'id'      => 'colorpicker',
		'type'    => 'colorpicker',
		'default' => '#ff4100',
	));



}

add_action( 'cmb2_admin_init', 'maxkomp_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 */
function maxkomp_register_theme_options_metabox() {

	$option_key = 'maxkomp_options';

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb2_metabox_form` helper function. See https://github.com/WebDevStudios/CMB2/wiki for more info.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'      => $option_key . 'page',
		'title'   => esc_html__( 'Theme Options Metabox', 'cmb2' ),
		'hookup'  => false, // Do not need the normal user/post hookup
		'show_on' => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( $option_key )
		),
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this option group.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Site Background Color', 'cmb2' ),
		'desc'    => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

}
