<?php
/**
 * Template Name: Kontakt
 */
?>

<!--    Google Maps-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBitEKDDU5IpjCk81W0PP11obSiy68KEVM">
</script>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<!--<section class="wap bg-blue cloud cloud-l-b">-->
<!--    <div class="container will-animate"-->
<!--         data-class="fadeInUp"-->
<!--         data-delay="500">-->
<!--        <div class="row justify-content-center">-->
<!--            <h2 class="fg-white">Kontor</h2>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section id="offices" class="bg-white">
    <div class="container">
        <div class="row">
            <?php
            $args = array( 'post_type' => 'office', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post();
                $email = get_post_meta($post->ID, 'maxkomp_office_email', true);
                $phone = get_post_meta($post->ID, 'maxkomp_office_phone', true);
                $address = get_post_meta($post->ID, 'maxkomp_office_address', true);
            ?>


                <div class="col-12 col-md-4 mb-5 office-item">
                    <div class="img-wrapper">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid office-img')); ?>

                        <div class="map-wrapper">
                            <div id="map" class="map"></div>
                        </div>

                        <div class="row justify-content-center align-items-center text-wrapper">
                            <h3 class="text-uppercase fg-orange caption"><?= get_the_title();?></h3>
                        </div>

                    </div>



                    <div class="textbox">
                        <address>
                            <h5><strong class="title">Maxkompetens <?= get_the_title(); ?></strong></h5>
                            <span itemprop="streetAddress" class="address1"><?= $address['address-1'];?></span><br>
                            <?php if($address['address-2']): ?>
                            <span itemprop="streetAddress" class="address2"><?= $address['address-2'];?></span><br>
                            <?php endif;?>
                            <span itemprop="postalCode" class="zip"><?= $address['zip'];?></span> <span itemprop="addressRegion" class="city"><?= $address['city'];?></span><br>
                            <p class="mt-2">
                                <a itemprop="phone" href="tel:<?= $phone; ?>" class="phone"><?= $phone; ?></a><br>
                                <a itemprop="email" href="mailto:<?= $email; ?>" class="email"><?= $email; ?></a>
                            </p>
                        </address>
                    </div>



                </div>

            <?php
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_template_part('templates/section', 'contact'); ?>


<?php get_template_part('templates/section', 'companies'); ?>
