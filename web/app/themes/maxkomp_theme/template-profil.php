<?php
/**
 * Template Name: Profil
 */
?>

<?php get_template_part('templates/page', 'header-profil'); ?>
<?php get_template_part('templates/content', 'page'); ?>


<section id="profile-content">
    <div class="profile-menu">
        <?php
        if (has_nav_menu('profile_navigation')) :
            wp_nav_menu([
                'theme_location' => 'profile_navigation',
                'menu_class' => 'nav',
                'menu_id' => 'main-menu',
                'container_id' => 'profile-menu',
                'container_class' => 'row flex-items-xs-center flex-items-xs-middle text-xs-center',
                'walker' => new Profile_Menu_Walker(),'depth' => 0
            ]);
        endif;
        ?>
    </div>

    <h4><a href="#" class="download-wap">Download</a></h4>
    <div class="container wrapper m-t-2">
        <div class="arrow"></div>
        <div class="row" id="wap">
            <?php
            if(is_page('profil')) {
                get_template_part('templates/profile', 'resume');
            }elseif(is_page('cv')) {
                get_template_part('templates/profile', 'cv');
            }
            ?>
        </div>


    </div>
</section>