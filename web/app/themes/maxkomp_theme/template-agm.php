<?php
/**
 * Template Name: Bolagsstämma
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
            $args = array( 'post_type' => 'agm', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post();  ?>

                <div class="col-12">
                    <a href="<?= get_the_permalink(); ?>">
                        <h5><?php the_title(); ?></h5>
                    </a>
                </div>
                <?php
            endwhile;
            ?>
        </div>

    </div>
</section>

