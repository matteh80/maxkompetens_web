<?php
/**
 * Template Name: Söker du jobb
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="regionSelect bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <a href="?region=Stockholms+län">
                    <img src="https://unsplash.it/500/300" class="img-fluid" />
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="?region=Västra+Götalands+län">
                    <img src="https://unsplash.it/500/300" class="img-fluid" />
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="?region=Stockholms län">
                    <img src="https://unsplash.it/500/300" class="img-fluid" />
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="?region=Stockholms län">
                    <img src="https://unsplash.it/500/300" class="img-fluid" />
                </a>
            </div>
        </div>
    </div>
</section>

<div class="bg-white jobslist">
    <div class="container">
        <div class="row">
            <div id="listWrapper">
                <iframe id="jobiframe" width="570" scrolling="no"></iframe>
            </div>
        </div>
    </div>
</div>


<?php get_template_part('templates/section', 'stats'); ?>
<?php get_template_part('templates/section', 'companies'); ?>