<?php
/**
 * Template Name: SEO-sida
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<?php get_template_part('templates/section', 'contact'); ?>


<?php get_template_part('templates/section', 'companies'); ?>
