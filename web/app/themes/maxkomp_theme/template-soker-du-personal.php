<?php
/**
 * Template Name: Söker du personal
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="jumbo" style="background: url('<?= \Roots\Sage\Assets\asset_path('images/medarbetare.jpg'); ?>'); background-attachment: fixed">
  <div class="jumbotron jumbotron-fluid ">
    <div class="container text-xs-center ">
      <div class="row flex-items-xs-middle">
        <div class="col-xs-12">
          <h1 class="display-1 text-uppercase will-animate" data-class="zoomIn">Dags för <span class="text-orange">nya</span> medarbetare?</h1>
          <p class="lead will-animate" data-class="zoomIn" data-delay="250">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis metus interdum, malesuada nunc eget, interdum urna.
            In enim libero, ullamcorper sed vulputate non, fringilla at mi. In vel bibendum urna.</p>
        </div>
      </div>
      <div class="row buttons flex-items-xs-center">
        <div class="col-sm-3">
          <button class="btn btn-primary text-uppercase will-animate" data-class="flipInX" data-delay="500">Bemanning</button>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-primary text-uppercase will-animate" data-class="flipInX" data-delay="550">Rekrytering</button>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-primary text-uppercase will-animate" data-class="flipInX" data-delay="600">Kompetensförsörjning</button>
        </div>
      </div>
    </div>
  </div>
</section>
