<?php
/**
 * Template Name: Bemanning
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header-bemanning'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="process">
  <div class="container">
    <div class="row flex-items-xs-center flex-items-xs-middle">
      <h2 class="display-3">Vår process</h2>
    </div>
  </div>
</section>

<section style='background: url("<?= \Roots\Sage\Assets\asset_path('images/temp_kompetens.jpg'); ?>"); background-size: cover; min-height: 450px;'>

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
