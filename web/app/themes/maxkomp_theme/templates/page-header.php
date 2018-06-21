<?php use Roots\Sage\Titles; ?>

<!--<div class="page-header">-->
<!--  <h1>--><?//= Titles\title(); ?><!--</h1>-->
<!--</div>-->

<?php
$title = \Roots\Sage\Extras\modifyTitleWithOrangeWord(get_post_meta($post->ID, 'maxkomp_page_title', true), get_post_meta($post->ID, 'maxkomp_page_textorange_select', true));
$text = get_post_meta($post->ID, 'maxkomp_page_text', true);
$headertext = get_post_meta($post->ID, 'maxkomp_page_headertext', true);
$textcolor = get_post_meta($post->ID, 'maxkomp_page_colorpicker', true);
$buttons_meta = get_post_meta($post->ID, 'maxkomp_buttons_group_buttons', true);
$bgpos_meta = get_post_meta($post->ID, 'maxkomp_page_background_position', true);
$bgpos = 'center';
switch($bgpos_meta) {
    case 'left':
        $bgpos = 'left';
        break;

	case 'semi-left':
		$bgpos = '25%';
		break;

	case 'center':
		$bgpos = 'center';
		break;

	case 'semi-right':
		$bgpos = '75%';
		break;

	case 'right':
		$bgpos = 'right';
		break;

    default:
        $bgpos = 'center';
}
//array_key_exists('title', $buttons_meta[0]
?>

<section
        class="jumbo"
        style="background-image: url('<?php if(!is_singular('referencecase')) { echo the_post_thumbnail_url(); } ?>'); background-position: <?= $bgpos; ?>"
>
    <?php if(is_page()) : ?>
    <div class="jumbotron jumbotron-fluid <?php if(!has_post_thumbnail() && !is_page('bemanning')) {echo 'jumbo-small cloud cloud-l-b';} ?>">
    <?php else: ?>
    <div class="jumbotron jumbotron-fluid jumbo-small cloud cloud-l-b">
    <?php endif;?>
        <div class="container text-xs-center d-flex justify-content-center align-items-center">
            <div class="row w-100 align-items-center justify-content-center full-height">
                <div style="color:<?=  $textcolor; ?>; width: 100%; text-align: center">
                    <?php if(is_front_page()) : ?>
                        <div class="col-6 col-md-4 mx-auto">
                            <img src="<?= \Roots\Sage\Extras\getRelativeUploadPath(maxkomp_get_option('logo_wap')); ?>" style="margin: 0 auto; display: block;" class="img-fluid align-self-center"/>
                        </div>
                    <?php else: ?>
                        <?php
                        $headerclass = '';
                        if(!has_post_thumbnail() || is_singular('referencecase')) {
                            $headerclass = 'fg-white';
                        }

                        if(is_singular('referencecase')) {
                            $title = "Referenscase: ".$title;
                        }

                        if(is_page('jobs')) {
                            $title = '...';
                        }
                        ?>
                        <div class="col">
                            <h1 class="page-title display-1 text-uppercase text-xs-center <?= $headerclass; ?>"><?= $title; ?></h1>
                        </div>

                    <div class="col m-b-3">
                        <div class="lead will-animate" data-class="fadeInUp" data-delay="250"><?= $headertext; ?></div>
                    </div>
                    <?php endif; ?>
                    <div class="row buttons align-items-center justify-content-center mx-3">
                        <?php
                        if($buttons_meta != "") :
                            $delay = 500;
                            $index = 0;
                            foreach ($buttons_meta as $button):
                                if(array_key_exists('title', $button)) {
                                    if(!array_key_exists('button_link', $button) && !array_key_exists('ext_link', $button)) {
	                                    $link = "#";
                                    }else if(array_key_exists('ext_link', $button) && strlen($button['ext_link']) > 0) {
	                                    $link = $button['ext_link'];
                                    }else if(array_key_exists('button_link', $button) && strlen($button['button_link']) > 0){
                                        $link = get_permalink($button['button_link']);
                                    }
                                    ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                        <div class="fancy-button large btn-green">
                                            <div class="left-frills frills"></div>
                                            <a href="<?= $link ?>" class="button large btn-green will-animate" data-class="flipInX" data-delay="<?= $delay;?>"><?= $button['title']; ?></a>
                                            <div class="right-frills frills"></div>
                                        </div>
<!--                                        <a href="--><?//= $link ?><!--" class="btn btn-primary text-uppercase will-animate hvr-float-shadow" data-class="flipInX" data-delay="--><?//= $delay;?><!--">--><?//= $button['title']; ?><!--</a>-->
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
                        <?php
                        if(is_page('bemanning')) {
                            ?>
                            <div class="col-xs-12 col-sm-10 col-md-8 m-t-3">
                                <h2 class="display-4 m-t-3 will-animate" data-class="fadeIn" data-delay="620">Vilken kompetens söker du?</h2>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-10 will-animate" data-class="flipInY" data-delay="650">
                                        <input class="search-candidates text-center" id="kompetenser" type="text">
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
<!--                    <i class="fa fa-angle-down scrolldown"></i>-->
                </div>

            </div>
            <div class="scroll-tab">
<!--                <img src="--><?//= \Roots\Sage\Assets\asset_path('images/scroll-tab.png'); ?><!--" class="img-fluid will-animate" data-class="fadeInUp"/>-->
            </div>
        </div>
    </div>
</section>