<!--<div class="navbar-toggle collapsed" id="toggle" aria-label="Toggle navigation">-->
<!--    <span class="bar1"></span>-->
<!--    <span class="bar2"></span>-->
<!--    <span class="bar3"></span>-->
<!--</div>-->
<div class="nav-mobile-wrapper">
    <nav class="nav-mobile hidden-lg-up">
        <div class="nav-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 align-self-start">
                    <div class="row">
                        <?php
                        if (has_nav_menu('primary_navigation')) :
                            wp_nav_menu([
                                'theme_location' => 'primary_navigation',
                                'menu_class' => 'nav',
                                'menu_id' => 'main-menu',
                                'container_id' => 'menu-container',
                                'container_class' => 'container',
                                'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
                                'walker' => new Mobile_Menu_Walker(),
                            ]);
                        endif;
                        ?>
                    </div>
                </div>

                <div class="nav-footer col-12 align-self-end">
                    <div class="row cloud cloud-l-b"></div>
                    <div class="row align-items-center justify-content-center social-icons">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="navbar-toggle hidden-lg-up pull-xs-left collapsed" aria-label="Toggle navigation">
    <span class="bar1"></span>
    <span class="bar2"></span>
    <span class="bar3"></span>
</div>

<header class="banner">

    <div class="container">
        <div class="row">
            <a class="brand pull-lg-left" href="<?= esc_url(home_url('/')); ?>">
                <?php
                $logoselection = get_post_meta($post->ID, 'maxkomp_page_logo_selection', true);
                if($logoselection == "") : ?>
                    <img src="<?= \Roots\Sage\Extras\getRelativeUploadPath(maxkomp_get_option('logo_primary')); ?>" class="img-fluid logo"/>
                <?php else: ?>
                    <img src="<?= \Roots\Sage\Extras\getRelativeUploadPath(maxkomp_get_option('logo_'.$logoselection)); ?>" class="img-fluid logo"/>
                <?php endif; ?>

            </a>
            <nav class="nav-primary pull-lg-right hidden-md-down">
                <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'nav',
                        'menu_id' => 'main-menu',
                        'container_id' => 'menu-container',
                        'container_class' => 'container',
                        'walker' => new Custom_Menu_Walker(),
                    ]);
                endif;
                ?>
            </nav>
        </div>
    </div>
</header>