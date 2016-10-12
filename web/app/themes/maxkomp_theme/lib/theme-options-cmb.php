<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class Maxkomp_Admin {
    /**
     * Option key, and option page slug
     * @var string
     */
    private $key = 'Maxkomp_options';
    /**
     * Options page metabox id
     * @var string
     */
    private $metabox_id = 'Maxkomp_option_metabox';
    /**
     * Options Page title
     * @var string
     */
    protected $title = '';
    /**
     * Options Page hook
     * @var string
     */
    protected $options_page = '';
    /**
     * Holds an instance of the object
     *
     * @var Maxkomp_Admin
     **/
    private static $instance = null;
    /**
     * Constructor
     * @since 0.1.0
     */
    private function __construct() {
        // Set our title
        $this->title = __( 'Site Options', 'Maxkomp' );
    }
    /**
     * Returns the running object
     *
     * @return Maxkomp_Admin
     **/
    public static function get_instance() {
        if( is_null( self::$instance ) ) {
            self::$instance = new self();
            self::$instance->hooks();
        }
        return self::$instance;
    }
    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
        add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
    }
    /**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( $this->key, $this->key );
    }
    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
        $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
        // Include CMB CSS in the head to avoid FOUC
        add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
    }
    /**
     * Admin page markup. Mostly handled by CMB2
     * @since  0.1.0
     */
    public function admin_page_display() {
        ?>
        <div class="wrap cmb2-options-page <?php echo $this->key; ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
        </div>
        <?php
    }

    /**
     * Returns social media
     * @param  mixed $value Selected/saved social media
     * @return string       html string containing all social media options
     */
    function cmb2_get_state_options( $value = false ) {
        $state_list = array( 'FB'=>'Facebook','IG'=>'Instagram');

        $state_options = '';
        foreach ( $state_list as $abrev => $state ) {
            $state_options .= '<option value="'. $abrev .'" '. selected( $value, $abrev, false ) .'>'. $state .'</option>';
        }

        return $state_options;
    }

    function cmb2_render_social_media($field, $value, $object_id, $object_type, $field_type) {
        // make sure we specify each part of the value we need.
        $value = wp_parse_args( $value, array(
            'address-1' => '',
            'address-2' => '',
            'city'      => '',
            'state'     => '',
            'zip'       => '',
        ) );?>

        <div><p><label for="<?php echo $field_type->_id( '_address_1' ); ?>">Address 1</label></p>
        <?php echo $field_type->input( array(
            'name'  => $field_type->_name( '[address-1]' ),
            'id'    => $field_type->_id( '_address_1' ),
            'value' => $value['address-1'],
            'desc'  => '',
        ) ); ?>
        </div>
        <div><p><label for="<?php echo $field_type->_id( '_address_2' ); ?>'">Address 2</label></p>
            <?php echo $field_type->input( array(
                'name'  => $field_type->_name( '[address-2]' ),
                'id'    => $field_type->_id( '_address_2' ),
                'value' => $value['address-2'],
                'desc'  => '',
            ) ); ?>
        </div>
        <div class="alignleft"><p><label for="<?php echo $field_type->_id( '_city' ); ?>'">City</label></p>
            <?php echo $field_type->input( array(
                'class' => 'cmb_text_small',
                'name'  => $field_type->_name( '[city]' ),
                'id'    => $field_type->_id( '_city' ),
                'value' => $value['city'],
                'desc'  => '',
            ) ); ?>
        </div>
        <div class="alignleft"><p><label for="<?php echo $field_type->_id( '_state' ); ?>'">State</label></p>
            <?php echo $field_type->select( array(
                'name'    => $field_type->_name( '[state]' ),
                'id'      => $field_type->_id( '_state' ),
                'options' => cmb2_get_state_options( $value['state'] ),
                'desc'    => '',
            ) ); ?>
        </div>
        <div class="alignleft"><p><label for="<?php echo $field_type->_id( '_zip' ); ?>'">Zip</label></p>
            <?php echo $field_type->input( array(
                'class' => 'cmb_text_small',
                'name'  => $field_type->_name( '[zip]' ),
                'id'    => $field_type->_id( '_zip' ),
                'value' => $value['zip'],
                'type'  => 'number',
                'desc'  => '',
            ) ); ?>
        </div>
        <br class="clear">
        <?php
    echo $field_type->_desc( true );

    }



    /**
     * Add the options metabox to the array of metaboxes
     * @since  0.1.0
     */
    function add_options_page_metabox() {
        // hook in our save notices
        add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );
        $cmb = new_cmb2_box( array(
            'id'         => $this->metabox_id,
            'hookup'     => false,
            'cmb_styles' => false,
            'show_on'    => array(
                // These are important, don't remove
                'key'   => 'options-page',
                'value' => array( $this->key, )
            ),
        ) );
        // Set our CMB2 fields
        $cmb->add_field( array(
            'name' => __( 'Test Text', 'Maxkomp' ),
            'desc' => __( 'field description (optional)', 'Maxkomp' ),
            'id'   => 'test_text',
            'type' => 'text',
            'default' => 'Default Text',
        ) );
        $cmb->add_field( array(
            'name'    => __( 'Test Color Picker', 'Maxkomp' ),
            'desc'    => __( 'field description (optional)', 'Maxkomp' ),
            'id'      => 'test_colorpicker',
            'type'    => 'colorpicker',
            'default' => '#bada55',
        ) );
    }
    /**
     * Register settings notices for display
     *
     * @since  0.1.0
     * @param  int   $object_id Option key
     * @param  array $updated   Array of updated fields
     * @return void
     */
    public function settings_notices( $object_id, $updated ) {
        if ( $object_id !== $this->key || empty( $updated ) ) {
            return;
        }
        add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'Maxkomp' ), 'updated' );
        settings_errors( $this->key . '-notices' );
    }
    /**
     * Public getter method for retrieving protected/private variables
     * @since  0.1.0
     * @param  string  $field Field to retrieve
     * @return mixed          Field value or exception is thrown
     */
    public function __get( $field ) {
        // Allowed fields to retrieve
        if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
            return $this->{$field};
        }
        throw new Exception( 'Invalid property: ' . $field );
    }
}
/**
 * Helper function to get/return the Maxkomp_Admin object
 * @since  0.1.0
 * @return Maxkomp_Admin object
 */
function Maxkomp_admin() {
    return Maxkomp_Admin::get_instance();
}
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function Maxkomp_get_option( $key = '' ) {
    return cmb2_get_option( Maxkomp_admin()->key, $key );
}
// Get it started
Maxkomp_admin();