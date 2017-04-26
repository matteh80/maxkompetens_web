<?php
if(get_the_content() != ""):
?>
<section class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php
endif;
wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
?>
