<?php
    global $post;

    $page = $post->post_name;
?>

<section id="contact" class="bg-blue cloud cloud-l-b">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center fg-white">
                <?php if($page === 'bemanning') {
                    echo '<h2 class="text-uppercase mb-5">Vill du veta mer?</h2>';
                } else {
                    echo '<h2 class="text-uppercase mb-5">Kontakta oss direkt</h2>';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Företag" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kontaktperson" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-post" required />
                        </div>
                    </div>

                    <?php if($page === 'kontakt') : ?>
                        <div class="form-group">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meddelande" required></textarea>
                            </div>
                        </div>
                    <?php endif;?>
                </form>
            </div>
            <div class="col-12 col-lg-4">
                <div class="col-12 contact-side py-5 px-5">
                    <h5 style="font-weight: 100 !important;">Ring oss på <a href="tel:081234567">08-123 45 67</a></h5>
                    <h5 style="font-weight: 100 !important;">Maila oss på <a href="mailto:sverige@maxkompetens.se">sverige@maxkompetens.se</a></h5>
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