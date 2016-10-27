<?php
/**
 * Template Name: Söker du personal
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

<?php get_template_part('templates/section', 'kompetenssakrade'); ?>


<?php get_template_part('templates/section', 'companies'); ?>
