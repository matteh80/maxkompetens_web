<?php
/**
 * Template Name: Front Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="no-idea cloud cloud-r-b">
    <div class="container">
        <div class="row">
            <div class="col-md-6 will-animate text-center" data-class="flipInY" data-delay="250">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_jobb.png'); ?>" class="img-fluid col-xs-10 col-lg-10" />
                <h3>Vilket är ditt drömjobb? Vi hjälper dig dit.</h3>
                <p>Skapa din kompletta digitala jobbprofil i Wap. Wap erbjuder allt du behöver för ditt jobbsökande, utan kostnad.</p>
                <div class="col-xs-12 col-sm-6 offset-md-3">
                    <div class="fancy-button">
                        <div class="left-frills frills"></div>
                        <div class="button">Söker du personal?</div>
                        <div class="right-frills frills"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 will-animate text-center" data-class="flipInY" data-delay="450"">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_personal.png'); ?>" class="img-fluid col-xs-10 col-lg-10" />
                <h3>Vilken kompetens söker du?</h3>
                <p>Vi går ett steg längre och adderar personlighetstester, videos, drömjobb och drivkrafter till kompetens och erfarenheter.
                    Genom att känna kandidaternas meriter på djupet ger vi dig rätt person på rätt plats.</p>
                <div class="col-xs-12 col-sm-6 offset-md-3">
                    <div class="fancy-button">
                        <div class="left-frills frills"></div>
                        <a href="/soker-du-personal" class="button">Söker du jobb?</a>
                        <div class="right-frills frills"></div>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="companies">
    <div class="container-fluid">
        <div class="row flex-items-xs-middle">
            <div id="slideouter">
                <div id="slideshow">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/randstad.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/Leviton-logo.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/plastipak.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/t-mobile.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/kindred-healthcare-logo.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/randstad.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/Leviton-logo.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/plastipak.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/t-mobile.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/kindred-healthcare-logo.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/randstad.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/Leviton-logo.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/plastipak.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/t-mobile.png"
                        class="slideimage">
                    <img
                        src="http://www.coffeecreamthemes.com/themes/jobseek/v2/wp-content/uploads/2016/08/kindred-healthcare-logo.png"
                        class="slideimage">
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
