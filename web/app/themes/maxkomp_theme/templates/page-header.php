<?php use Roots\Sage\Titles; ?>

<!--<div class="page-header">-->
<!--  <h1>--><?//= Titles\title(); ?><!--</h1>-->
<!--</div>-->

<?php
$title = \Roots\Sage\Extras\modifyTitleWithOrangeWord(get_post_meta($post->ID, 'maxkomp_page_title', true), get_post_meta($post->ID, 'maxkomp_page_textorange_select', true));
$text = get_post_meta($post->ID, 'maxkomp_page_text', true);
$textcolor = get_post_meta($post->ID, 'maxkomp_page_colorpicker', true);
?>

<section class="jumbo" style="background: url('<?= the_post_thumbnail_url(); ?>'); background-attachment: fixed">
    <div class="jumbotron jumbotron-fluid ">
        <div class="container text-xs-center ">
            <div class="row flex-items-xs-middle flex-items-xs-center full-height">
                <div style="color:<?=  $textcolor; ?>">
                    <h1 class="display-1 text-uppercase will-animate" data-class="zoomIn"><?= $title; ?></h1>
                    <span class="lead will-animate" data-class="zoomIn" data-delay="250"><?= $text; ?></span>
                    <div class="row buttons flex-items-xs-center">
                        <?php
                        $buttons_meta = get_post_meta($post->ID, 'maxkomp_buttons_group_buttons', true);
                        if($buttons_meta != "") :
                            $delay = 500;
                            $index = 0;
                            foreach ($buttons_meta as $button):
                                if(array_key_exists('title', $button)) {
                                    if(!array_key_exists('button_link', $button)) {
                                        $link = "#";
                                    }else{
                                        $link = get_permalink($button['button_link']);
                                    }
                                    ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <a href="<?= $link ?>" class="btn btn-primary text-uppercase will-animate" data-class="flipInX" data-delay="<?= $delay;?>"><?= $button['title']; ?></a>
                                    </div>
                                    <?php
                                    $delay = $delay + ($index + 50);
                                    $index++;
                                }
                                ?>
                                <?php
                            endforeach;
                        endif;
                        ?>


                    </div>
                </div>

            </div>

        </div>
    </div>
</section>