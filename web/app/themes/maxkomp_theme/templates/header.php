<nav class="nav-primary">
  <div class="navbar-toggle collapsed" aria-label="Toggle navigation">
    <span class="bar1"></span>
    <span class="bar2"></span>
    <span class="bar3"></span>
  </div>
  <?php
  if (has_nav_menu('primary_navigation')) :
    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
  endif;
  ?>
</nav>

<header class="banner">
  <div class="container-fluid">
	  <div class="row">
		  <a class="brand pull-lg-left" href="<?= esc_url(home_url('/')); ?>">
			  <img src="<?= \Roots\Sage\Assets\asset_path('images/logo.png'); ?>" class="img-fluid logo" />
			  <!--                <img src="--><?//= \Roots\Sage\Assets\asset_path('images/symbol.png'); ?><!--" class="img-fluid symbol hidden-lg-up" />-->
		  </a>
	  </div>
  </div>
</header>
