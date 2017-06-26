<?php
/**
 * Template Name: Pressmeddelanden
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>

    <section class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-12" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                    $xml = simplexml_load_file('http://publish.ne.cision.com/v2.0/Release/ListReleasesSortedByPublishDate/?feedUniqueIdentifier=0b99979a69');

                    foreach($xml->Release as $release) : ?>

                        <?php $utcDate = $release->attributes()->PublishDateUtc; ?>
                        <div class="news-item" role="tab" data-parent="#accordion">
                            <div class="clickArea collapsed" data-toggle="collapse" data-target="#<?= $release->attributes()->Id; ?>"
                                 aria-expanded="false" aria-controls="collapseExample" data-url="<?= $release->attributes()->DetailUrl; ?>">
                                <div class="clearfix">
                                    <small class="datetime pull-left"><?= substr(str_replace("T", " ", $utcDate), 0, -3); ?></small>
                                    <?php if($release->IsRegulatory == 'true') : ?>
                                        <small class="IsRegulatory pull-left">Regulatorisk</small>
                                    <?php endif;?>
                                    <i class="fa fa-chevron-down pull-right"></i>
                                </div>
                                <div class="clearfix">
                                    <h5 class="title"><?= $release->Title; ?></h5>
                                    <p class="text"><?= $release->Intro; ?></p>
                                </div>
                            </div>

                            <div class="collapse" id="<?= $release->attributes()->Id; ?>">
                                <div class="row justify-content-center align-items-center">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </div>
                            </div>
                        </div>

                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>