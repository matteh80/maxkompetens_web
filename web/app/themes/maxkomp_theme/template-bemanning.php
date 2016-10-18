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

<section class="process">
    <div class="container">
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <h2 class="display-4">Vår process</h2>
            <p class="lead m-t-3 text-xs-center">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="row flex-items-xs-center flex-items-xs-middle m-t-3 m-b-3">
            <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
                <div class="row timeline flex-items-xs-center flex-items-xs-middle">
                    <div class="col-xs-12 col-sm round-border">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="col-xs-12 col-sm line">

                    </div>
                    <div class="col-xs-12 col-sm round-border">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="col-xs-12 col-sm line">

                    </div>
                    <div class="col-xs-12 col-sm round-border">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <div class="col-xs-12 col-sm line">

                    </div>
                    <div class="col-xs-12 col-sm round-border">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="kompetens-sakrade overlay-white">
    <div class="container">
        <div class="row flex-items-sm-center flex-items-sm-middle m-b-3">
            <div class="col-xs">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/kompetens_cv.png'); ?>" class="img-fluid"/>

                <i class="fa fa-plus"></i>

                <img src="<?= \Roots\Sage\Assets\asset_path('images/kompetens_film.png'); ?>" class="img-fluid"/>

                <i class="fa fa-plus"></i>

                <img src="<?= \Roots\Sage\Assets\asset_path('images/kompetens_intervju.png'); ?>" class="img-fluid"/>
            </div>

        </div>
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <h2 class="display-4">Kompetenssäkrade kandidater</h2>
            <span class="lead m-t-3 text-xs-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
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
