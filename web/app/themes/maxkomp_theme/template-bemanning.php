<?php
/**
 * Template Name: Bemanning
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="search-results">
    <div class="container">
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <h3 class="display-4 will-animate" data-class="fadeIn" data-delay="500">Just nu har vi <span class="text-orange">43 </span><span id="category"></span></h3>
        </div>
        <div class="row cards flex-items-xs-center flex-items-xs-middle m-t-3">
            <div class="col-md-4">
                <div class="candidate-card">
                    <div class="row flex-items-xs-center flex-items-xs-middle m-b-2">
                        <img src="<?= \Roots\Sage\Assets\asset_path('images/blurred_female.png'); ?>" class="img-fluid img-circle" />
                    </div>
                    <div class="row text-xs-center name">
                        <h4 class="text-orange m-b-0">Anna</h4>
                        <span>Digital Designer</span>
                    </div>
                    <div class="row button">
                        <button class="btn btn-primary m-t-3">Skicka intresseförfrågan</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="candidate-card">
                    <div class="row flex-items-xs-center flex-items-xs-middle m-b-2">
                        <img src="<?= \Roots\Sage\Assets\asset_path('images/blurred_female.png'); ?>" class="img-fluid img-circle" />
                    </div>
                    <div class="row text-xs-center name">
                        <h4 class="text-orange m-b-0">Anna</h4>
                        <span>Digital Designer</span>
                    </div>
                    <div class="row button">
                        <button class="btn btn-primary m-t-3">Skicka intresseförfrågan</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="candidate-card">
                    <div class="row flex-items-xs-center flex-items-xs-middle m-b-2">
                        <img src="<?= \Roots\Sage\Assets\asset_path('images/blurred_female.png'); ?>" class="img-fluid img-circle" />
                    </div>
                    <div class="row text-xs-center name">
                        <h4 class="text-orange m-b-0">Anna</h4>
                        <span>Digital Designer</span>
                    </div>
                    <div class="row button">
                        <button class="btn btn-primary m-t-3">Skicka intresseförfrågan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('templates/section', 'process'); ?>

<?php get_template_part('templates/section', 'kompetenssakrade'); ?>

<?php get_template_part('templates/section', 'companies'); ?>
