<?php
if(get_the_content() != ""):
?>
<section>
    <div class="container">
        <div class="row">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php
endif;
wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
?>
