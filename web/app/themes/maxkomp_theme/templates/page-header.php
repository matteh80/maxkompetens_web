<?php use Roots\Sage\Titles; ?>

<!--<div class="page-header">-->
<!--  <h1>--><?//= Titles\title(); ?><!--</h1>-->
<!--</div>-->

<section class="jumbo" style="background: url('<?= the_post_thumbnail_url(); ?>'); background-attachment: fixed">
    <div class="jumbotron jumbotron-fluid ">
        <div class="container text-xs-center ">
            <div class="row flex-items-xs-middle">
                <div class="col-xs-12">
                    <?php $title = \Roots\Sage\Extras\modifyTitleWithOrangeWord(get_post_meta($post->ID, 'maxkomp_page_title', true), get_post_meta($post->ID, 'maxkomp_page_textorange', true));?>
                    <h1 class="display-1 text-uppercase will-animate" data-class="zoomIn"><?= $title; ?></h1>
                    <p class="lead will-animate" data-class="zoomIn" data-delay="250"><?= get_post_meta($post->ID, 'maxkomp_page_text', true); ?></p>
                </div>
            </div>
            <div class="row buttons flex-items-xs-center">
            <?php
            $buttons_meta = get_post_meta($post->ID, 'maxkomp_buttons_group_buttons', true);
            $delay = 500;
            foreach ($buttons_meta as $button):
            ?>
                <div class="col-sm-3">
                    <button class="btn btn-primary text-uppercase will-animate" data-class="flipInX" data-delay="<?= $delay;?>"><?= $button['title']; ?></button>
                </div>
            <?php endforeach;?>
            </div>
        </div>
    </div>
</section>