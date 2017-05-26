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
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-12">
                <h3 class="display-4 will-animate" data-class="fadeIn" data-delay="500">Just nu har vi <span class="text-orange numCandidates">0 </span>kandidater som matchar <span class="text-orange" id="category"></span></h3>
                <p>Ring <a href="tel:08-120 753 00">08-120 753 00</a> eller maila <a href="mailto:sverige@maxkompetens.se">sverige@maxkompetens.se</a>, så hjälper vi
                    dig att hitta den bästa kandidaten för just din verksamhet!</p>

                <p>Kandidaterna har redan kvalificerat sig genom vår unika wap-process och har såväl kompetens som engagemang - centrala faktorer för en framgångsrik rekrytering.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_card.png'); ?>" class="img-fluid px-5" />
            </div>
            <div class="col">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_personlighetstest.png'); ?>" class="img-fluid px-5" />
            </div>
            <div class="col">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_film.png'); ?>" class="img-fluid px-5" />
            </div>
        </div>
        <div class="row align-items-center justify-content-center m-t-3">
            <h5>Vi väljer ut lämpliga kandidater och skickar er deras wap card, personlighetstest och wap film.</h5>
        </div>
    </div>
</section>

<?php get_template_part('templates/section', 'contact'); ?>

<?php get_template_part('templates/section', 'referencecases'); ?>

<?php get_template_part('templates/section', 'stats'); ?>

<?php get_template_part('templates/section', 'companies'); ?>
