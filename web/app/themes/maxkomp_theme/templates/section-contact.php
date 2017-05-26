<?php
    global $post;

    $page = $post->post_name;
?>

<section id="contact" class="bg-blue cloud cloud-l-b">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center fg-white">
                <h2 class="text-uppercase mb-5">Kontakta oss direkt</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-7">
                <form>
                    <?php if ($page !== 'bemanning') :?>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Namn" />
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($page === 'bemanning') :?>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Företag" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kontaktperson" />
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-post" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <textarea class="form-control" rows="4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meddelande" required></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-5">
                <div class="col-12 contact-side py-4 px-4">
                    <h5 style="font-weight: 100 !important;">Ring oss på <a href="tel:081234567">08-123 45 67</a></h5>
                    <h5 style="font-weight: 100 !important;">Maila oss på <a href="mailto:sverige@maxkompetens.se">sverige@maxkompetens.se</a></h5>
                    <div class="row">
                        <?php
                        $args = array( 'post_type' => 'office', 'posts_per_page' => -1 );
                        $loop = new WP_Query( $args );

                        while ( $loop->have_posts() ) : $loop->the_post();
                            $phone = get_post_meta($post->ID, 'maxkomp_office_phone', true);
                            echo '<div class="col-6"><h6 style="margin-bottom: 0">'.get_the_title().'</h6>';
                            echo '<a href="tel:'.$phone.'">'.$phone.'</a></div>';
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>

            <div class="paper-plane will-animate hidden-sm-down" data-class="fadeInRightBig" data-delay="1000">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/paper_plane.png'); ?>" class="img-fluid" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-3 align-self-end">
                <div class="fancy-button btn-white">
                    <div class="left-frills frills"></div>
                    <div class="button">Skicka</div>
                    <div class="right-frills frills"></div>
                </div>
            </div>
        </div>
    </div>
</section>