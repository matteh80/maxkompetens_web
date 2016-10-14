<div class="navbar-toggle collapsed" id="toggle" aria-label="Toggle navigation">
    <span class="bar1"></span>
    <span class="bar2"></span>
    <span class="bar3"></span>
</div>
<nav class="nav-primary">

<!--    <div class="navbar-toggle"  id="toggle-close" aria-label="Toggle navigation">-->
<!--        <span class="bar1"></span>-->
<!--        <span class="bar2"></span>-->
<!--        <span class="bar3"></span>-->
<!--    </div>-->

    <div class="nav_background"></div>

    <?php
    if (has_nav_menu('primary_navigation')) :
        wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'nav',
            'menu_id' => 'main-menu',
            'container_id' => 'menu-container'
        ]);
    endif;
    ?>


    <div class="container" id="menu-footer">
        <div class="row flex-items-xs-center">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
    </div>
</nav>

<header class="banner">
    <div class="container-fluid">
        <div class="row">
            <a class="brand pull-lg-left" href="<?= esc_url(home_url('/')); ?>">
                <?php
                $logoselection = get_post_meta($post->ID, 'maxkomp_page_logo_selection', true);
                if(!$logoselection) : ?>
                    <img src="<?= maxkomp_get_option('logo_primary'); ?>" class="img-fluid logo"/>
                <?php
                else:
                ?>
                <img src="<?= maxkomp_get_option('logo_'.$logoselection); ?>" class="img-fluid logo"/>
                <?php endif; ?>
            </a>

        </div>
    </div>
</header>