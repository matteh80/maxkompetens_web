<?php while (have_posts()) : the_post(); ?>
<section class="content-page">
    <div class="container">
        <div class="row">
            <article <?php post_class(); ?>>
<!--                <header>-->
<!--                    <h1 class="entry-title">--><?php //the_title(); ?><!--</h1>-->
<!--                    --><?php //get_template_part('templates/entry-meta'); ?>
<!--                </header>-->
                <div class="entry-content">
                    <img src="<?= get_the_post_thumbnail_url('thumbnail');?>" class="img-fluid pull-left" />
                    <?php the_content(); ?>
                </div>
                <footer>
                    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
                </footer>
                <?php comments_template('/templates/comments.php'); ?>
            </article>
        </div>
    </div>
</section>
<?php endwhile; ?>
