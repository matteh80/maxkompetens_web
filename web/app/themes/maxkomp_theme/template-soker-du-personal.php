<?php
/**
 * Template Name: Söker du personal
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="video no-padding">
    <div id="middle"></div>
    <div id="wrapper">
        <video id="loopvideo" width="auto" height="100%" autoPlay loop muted>
            <source src=<?= \Roots\Sage\Assets\asset_path('videos/wap-kund-rendercomp_loop.mp4'); ?> type="video/mp4"/>
            Your browser do not support this file
        </video>
        <i class="fa fa-play-circle" id="play-btn" aria-hidden="true"></i>
    </div>
    <div id="youtubeWrapper" data-offset="500">
        <!--        <iframe id="videoplayer" width="560" height="315" src="https://www.youtube.com/embed/Qdghiqt_AuA" frameborder="0" allowfullscreen></iframe>-->
        <div id="videoplayer"></div>
    </div>
</section>

<?php get_template_part('templates/section', 'kompetenssakrade'); ?>


<?php get_template_part('templates/section', 'companies'); ?>
