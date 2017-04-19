<!--<div class="navbar-toggle collapsed" id="toggle" aria-label="Toggle navigation">-->
<!--    <span class="bar1"></span>-->
<!--    <span class="bar2"></span>-->
<!--    <span class="bar3"></span>-->
<!--</div>-->



<header class="banner">
    <div class="container">
        <div class="row">
            <nav class="nav-primary">
                <div class="navbar-toggle hidden-sm-up" aria-label="Toggle navigation">
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
                        'walker' => new Custom_Menu_Walker(),
                    ]);
                endif;
                ?>
            </nav>
        </div>
    </div>
</header>