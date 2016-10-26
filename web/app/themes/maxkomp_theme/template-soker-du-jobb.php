<?php
/**
 * Template Name: Söker du jobb
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="video">
  <div class="bg"></div>
  <div class="container">
    <div class="row flex-items-xs-center flex-items-xs-middle">
      <h1 class="display-3 will-animate" data-class="zoomIn">Så här funkar det</h1>
      <img src="<?= \Roots\Sage\Assets\asset_path('images/camera.png'); ?>" class="will-animate" data-class="flipInX" data-delay="250""/>
    </div>
  </div>
</section>

<section class="stats bg-orange">
  <div class="container">
    <div class="row  flex-items-xs-center">
      <?php
      $stats_meta = maxkomp_get_option('stats');
      $size =count($stats_meta);
      $offset = (6-$size);
      echo '<div class="col-sm-'.$offset.'"></div>';
      foreach ($stats_meta as $stat):
      ?>
      <div class="col-xs-12 col-sm text-xs-center text-white">
        <h3 class="display-2 value count-up" data-value="<?= $stat['stat'];?>"></h3>
        <span><?= $stat['title'];?></span>
      </div>
      <?php
      endforeach;
      echo '<div class="col-sm-'.$offset.'"></div>';
      ?>
    </div>
  </div>
</section>

<section class="companies">
  <div class="container-fluid">
    <div class="row flex-items-xs-middle">
      <div id="slideouter">
        <div id="slideshow">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/randstad.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/Leviton-logo.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/plastipak.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/t-mobile.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/kindred-healthcare-logo.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/randstad.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/Leviton-logo.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/plastipak.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/t-mobile.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/kindred-healthcare-logo.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/randstad.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/Leviton-logo.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/plastipak.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/t-mobile.png" class="slideimage">
          <img src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/kindred-healthcare-logo.png" class="slideimage">
        </div>
      </div>
    </div>
    <div class="row controls hidden-xs-up">
      <div id="actions">
        <a id="prev" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <a id="next" href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</section>
