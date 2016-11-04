<?php use Roots\Sage\Titles; ?>

<!--<div class="page-header">-->
<!--  <h1>--><?//= Titles\title(); ?><!--</h1>-->
<!--</div>-->

<?php
$post_id = get_page_by_path('Profil')->ID;
$meta = get_post_meta($post_id, 'maxkomp_profile_group_sliders', true);
?>
<section id="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            for ($x = 0; $x < sizeof($meta); $x++) {
                if($x == 0) {
                    echo '<li data-target="#carousel-example-generic" data-slide-to="'.$x.'" class="active"></li>';
                }else{
                    echo '<li data-target="#carousel-example-generic" data-slide-to="'.$x.'"></li>';
                }
            }
            ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php

//            print_r($meta);
            $x = 0;
            foreach ($meta as $slider):
                if ($x == 0) {
                    $active = "active";
                }else{
                    $active = "";
                }
            ?>
            <div class="carousel-item <?= $active; ?>" style="background-image: url('<?= $slider['bg'];?>');">
                <div class="container text-xs-center">
                    <div class="row flex-items-xs-middle flex-items-xs-center full-height">
                        <h2 class="display-1"><?= $slider['slider_title'];?></h2>
                        <p class="lead"><?= $slider['slider_text'];?></p>
                        <img src="<?= $slider['icon']; ?>" alt="First slide" class="icon m-t-1">
                    </div>
                </div>
            </div>
            <?php
            $x++;
            endforeach;
            ?>
        </div>
    </div>
</section>



