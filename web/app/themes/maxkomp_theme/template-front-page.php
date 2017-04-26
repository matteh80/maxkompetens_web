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
                <div class="row h-100 justify-content-center">
                    <div class="col-12 align-self-start">
                        <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_jobb.png'); ?>" class="col-10 img-fluid"/>

                        <h3>Vilket är ditt drömjobb? Vi hjälper dig dit.</h3>
                        <p>Skapa din kompletta digitala jobbprofil i Wap. Wap erbjuder allt du behöver för ditt jobbsökande,
                            utan kostnad.</p>
                    </div>

                    <div class="col-12 col-sm-6 align-self-end">
                        <div class="fancy-button">
                            <div class="left-frills frills"></div>
                            <a href="/soker-du-jobb" class="button">Söker du jobb?</a>
                            <div class="right-frills frills"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 will-animate text-center" data-class="flipInY" data-delay="250">
                <div class="row h-100 justify-content-center">
                    <div class="col-12 align-self-start">
                        <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_personal.png'); ?>" class="col-10 img-fluid"/>
                        <h3>Vilken kompetens söker du?</h3>
                        <p>Vi går ett steg längre och adderar personlighetstester, videos, drömjobb och drivkrafter till
                            kompetens och erfarenheter.
                            Genom att känna kandidaternas meriter på djupet ger vi dig rätt person på rätt plats.</p>
                    </div>

                    <div class="col-12 col-sm-6 align-self-end">
                        <div class="fancy-button">
                            <div class="left-frills frills"></div>
                            <a href="/soker-du-personal" class="button">Söker du personal?</a>
                            <div class="right-frills frills"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<?php get_template_part('templates/section', 'companies'); ?>
