<?php define( 'ROOTS_URL', get_theme_root_uri() . '/' . get_template() ); ?>
<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
    'lib/assets.php',    // Scripts and stylesheets
    'lib/extras.php',    // Custom functions
    'lib/setup.php',     // Theme setup
    'lib/titles.php',    // Page titles
    'lib/wrapper.php',   // Theme wrapper class
    'lib/customizer.php', // Theme customizer
    'lib/cmb.php', // Custom MetaBoxes
    'lib/cmb-extras.php', // Extra functions for CMB
    'lib/cmb-plugins/adress-field-type.php',
    'lib/cpt/cpt-referencecase.php', // Custom Post Type Customers
//    'lib/cpt/cpt-medarbetare.php', // Custom Post Tytpe Medarbetare
    'lib/cpt/cpt-offices.php', // Custom Post Tytpe Medarbetare
    'lib/cpt/cpt-services.php', // Custom Post Tytpe Medarbetare
    'lib/cpt/cpt-corporation.php',
    'lib/theme-options-cmb.php',
    'lib/profile_menu_walker.php',
    'lib/Custom_Menu_Walker.php',
    'lib/Mobile_Menu_Walker.php',
    'lib/Footer_Menu_Walker.php',
    'lib/API/api.php',
    'lib/API/remote-api.php',
    'lib/Models/candidate.php',
    'lib/tinymce_fancy_button/tinymce_fancy_button.php',
//    'lib/jobs.php',
//    'lib/cpt/cpt-jobs.php',
//    'lib/admin-jobs.php'
];

foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);


