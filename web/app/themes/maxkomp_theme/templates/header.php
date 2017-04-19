<!--<div class="navbar-toggle collapsed" id="toggle" aria-label="Toggle navigation">-->
<!--    <span class="bar1"></span>-->
<!--    <span class="bar2"></span>-->
<!--    <span class="bar3"></span>-->
<!--</div>-->



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
                <nav class="nav-primary pull-lg-right">
                <div class="navbar-toggle hidden-md-up" aria-label="Toggle navigation">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </div>

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