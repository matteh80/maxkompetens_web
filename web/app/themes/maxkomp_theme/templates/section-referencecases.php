<section class="referencecases bg-white">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-10 col-sm-3">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/ic_referenscase.png'); ?>" class="img-fluid" />
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-10 text-center">
                <h2>Nöjda kunder</h2>
                <p>Vi har många nöjda kunder och de flesta anlitar oss löpande. Vi är ett tryggt, proffsigt och
                    kvalitetssäkert val och vi ger det lilla extra. Här är några av de företag som väljer oss för sin rekrytering.</p>
            </div>
        </div>
        <div class="row justify-content-center align-items-center mt-5">
            <?php
            $args = array( 'post_type' => 'referencecase', 'posts_per_page' => 3 );
            $loop = new WP_Query( $args );
            $x = 1;
            while ( $loop->have_posts() ) : $loop->the_post();

                echo '<a href="'.get_the_permalink().'" class="referencecase-item col-4 will-animate" data-class="flipInX" data-delay="'.(250*$x).'">';
                echo '<div class="mx-auto">';
                echo '<img src="'.get_the_post_thumbnail_url().'" class="img-fluid" />';
                echo '</div>';
                echo '</a>';

                $x++;
            endwhile;
            ?>
        </div>

        <div class="row justify-content-center mt-2">
            <div class="col-12 col-sm-3">
                <div class="fancy-button">
                    <div class="left-frills frills"></div>
                    <a href="/referenscase" class="button">våra referenscase</a>
                    <div class="right-frills frills"></div>
                </div>
            </div>
        </div>

    </div>
</section>