<?php
/**
 * Template Name: Referenscase
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section id="services" class="bg-white">
    <div class="container">
        <div class="row">
            <?php
            $args = array( 'post_type' => 'referencecase', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post();  ?>

                <div class="col-12 col-sm-6 col-md-4 mb-5 reference-item">
                    <a href="<?= get_the_permalink(); ?>" class="col-3">
                        <img src="<?= get_the_post_thumbnail_url();?>" class="img-fluid" />
                    </a>
                </div>
                <?php
            endwhile;
            ?>
        </div>

    </div>
</section>

<?php get_template_part('templates/section', 'stats'); ?>

<?php get_template_part('templates/section', 'companies'); ?>


