<?php
/**
 * Template Name: Vilka är vi
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section class="wap bg-blue cloud cloud-l-b">
    <div class="container will-animate"
         data-class="fadeInUp"
         data-delay="500">
        <div class="row justify-content-center">
            <h2 class="fg-white">Våra tjänster</h2>
        </div>
    </div>
</section>
<section id="services" class="bg-white">
    <div class="container">
        <?php
        $args = array( 'post_type' => 'service', 'posts_per_page' => -1 );
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();  ?>

            <div class="col-12 mb-5 service-item">
                <div class="row justify-content-center">
                    <div class="col-8 col-sm-6 col-md-3">
                        <img src="<?= get_the_post_thumbnail_url();?>" class="img-fluid" />
                    </div>
                </div>
                <div class="row justify-content-center">
                    <h3 class="text-uppercase"><?= get_the_title();?></h3>
                </div>
                <div id="<?= 'content'.get_the_ID()?>" class="row justify-content-center service-content collapsed">
                    <?php the_excerpt('...'); ?>
                    <div class="content-wrapper">
                        <?php the_content();?>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-12 col-sm-3">
                        <div class="fancy-button btn-green">
                            <div class="left-frills frills"></div>
                            <a href="#" class="button services-button" id="<?= get_the_ID();?>"><span>Läs mer</span></a>
                            <div class="right-frills frills"></div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endwhile;
        ?>
    </div>
</section>

<section id="corporations" class="bg-blue fg-white cloud cloud-l-t">
    <div class="container">
        <div class="row justify-content-center">
            <h3>Bolag i koncernen</h3>
        </div>
        <div class="row justify-content-center">
            <?php
            $args = array( 'post_type' => 'corporation', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post();
                $corp_url = get_post_meta(get_the_ID(), 'maxkomp_corporation_corp_url', true);
            ?>

                <div class="col-12 col-md-6 col-lg-3 my-5 corporation-item">
                    <div class="col-12 align-self-start text-xs-center logo">
                        <a href="<?php echo $corp_url; ?>">
                            <img src="<?= get_the_post_thumbnail_url();?>" class="mx-auto mt-0" />
                        </a>
                    </div>
                    <div class="col-12 align-self-end">
                        <h5 class="text-uppercase text-lg-center"><?= get_the_title();?></h5>
<!--                        <div class="content-wrapper">-->
<!--                            --><?php //the_content();?>
<!--                        </div>-->
                    </div>
                </div>

                <?php
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_template_part('templates/section', 'stats'); ?>

<?php get_template_part('templates/section', 'companies'); ?>


