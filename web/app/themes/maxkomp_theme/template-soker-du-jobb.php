<?php
/**
 * Template Name: Söker du jobb
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
            <source src=<?= \Roots\Sage\Assets\asset_path('videos/wap-kandidat-rendercomp.mp4'); ?> type="video/mp4"/>
            Your browser do not support this file
        </video>
        <i class="fa fa-play-circle" id="play-btn" aria-hidden="true"></i>
    </div>
    <div id="youtubeWrapper" data-offset="500">
<!--        <iframe id="videoplayer" width="560" height="315" src="https://www.youtube.com/embed/Qdghiqt_AuA" frameborder="0" allowfullscreen></iframe>-->
        <div id="videoplayer"></div>
    </div>
</section>

<section class="wap bg-blue cloud cloud-large cloud-l-b">
    <div class="container will-animate"
         data-class="fadeInUp"
         data-delay="500">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-3">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/wap_logo_bee_wap_black.png'); ?>"
                     class="img-fluid"/>
            </div>
        </div>
    </div>
</section>
<section id="wap-info" class="bg-white">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-6">

                    <div class="col-12 col-sm-6 offset-sm-3 text-center">
                        <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_card.png'); ?>" class="img-fluid" />
                    </div>
                    <div class="col-12 text-center">
                        <h4>WAP CARD</h4>
                        <p>Ditt WAP Card ger dig och din potentiella arbetsgivare en snabb översikt av dig, din arbetslivserfarenhet och det du drömmer om att göra. Enkelt att ladda ned och dela.</p>
                    </div>

            </div>

            <div class="col-12 col-lg-6">

                    <div class="col-12 col-sm-6 offset-sm-3 text-center">
                        <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_film.png'); ?>" class="img-fluid" />
                    </div>
                    <div class="col-12 text-center">
                        <h4>WAP FILM</h4>
                        <p>Din WAP Film är en 60 s video, där du har möjlighet att kort presentera dig för presumtiva arbetsgivare. </p>
                    </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="col-12 col-sm-6 offset-sm-3 text-center">
                    <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_rekryterare.png'); ?>" class="img-fluid" />
                </div>
                <div class="col-12 text-center">
                    <h4>PERSONLIG REKRYTERARE</h4>
                    <p>Din personliga rekryterare coachar dig via mail, telefon, videosamtal och personliga möten. </p>
                </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="col-12 col-sm-6 offset-sm-3 text-center">
                    <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_cv.png'); ?>" class="img-fluid" />
                </div>
                <div class="col-12 text-center">
                    <h4>CV</h4>
                    <p>Vår tydliga mall guidar dig till ett snyggt och fullständigt CV</p>
                </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="col-12 col-sm-6 offset-sm-3 text-center">
                    <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_personlighetstest.png'); ?>" class="img-fluid" />
                </div>
                <div class="col-12 text-center">
                    <h4>PERSONLIGHETSTEST</h4>
                    <p>Våra personlighetstest lyfter fram dina styrkor, vad som driver dig och får dig att trivas på en arbetsplats.
                        Det hjälper oss att hitta rätt jobb för just dig. </p>
                </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="col-12 col-sm-6 offset-sm-3 text-center">
                    <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_story.png'); ?>" class="img-fluid" />
                </div>
                <div class="col-12 text-center">
                    <h4>WAP STORY</h4>
                    <p>Se historik och håll koll på status över dina sökta tjänster i WAP Story.</p>
                </div>

            </div>

        </div>
    </div>
</section>

<?php get_template_part('templates/section', 'stats'); ?>
<?php get_template_part('templates/section', 'companies'); ?>