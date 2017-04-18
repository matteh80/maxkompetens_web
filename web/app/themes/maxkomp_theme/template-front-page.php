<?php
/**
 * Template Name: Front Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="no-idea">
<div class="container">
    <div class="row p-y-2">
        <div class="col-sm will-animate" data-class="flipInY" data-delay="250">
            <h4>Söker du jobb?</h4>
            <h3>Vilket är ditt drömjobb?</h3>
            Vi hjälper dig dit. Skapa din kompletta digitala jobbprofil i Wap. Wap erbjuder allt du behöver för ditt jobbsökande, utan kostnad. 
        </div>
        <div class="col-sm will-animate" data-class="flipInY" data-delay="450"">
            <h4>Söker du personal?</h4>
            <h3>Vilken kompetens söker du?</h3>
            Vi går ett steg längre och adderar personlighetstester, videos, drömjobb och drivkrafter till kompetens och erfarenheter. Genom att känna kandidaternas meriter på djupet ger vi dig rätt person på rätt plats.
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
