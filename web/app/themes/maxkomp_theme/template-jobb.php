<?php
/**
 * Template Name: Jobbannonser
 */


?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<section style="background: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php

                if (isset($_GET['jaid'])) {
                    $key = $_GET['jaid'];
                }

//                        delete_transient($key);

                if ( false === ( $item = get_transient( $key ) ) ) {
//                    echo 'not cached';
                    $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
                    $map_url = "https://cv-maxkompetens.app.intelliplan.eu/JobAdGlobePages/Feed.aspx?pid=AA31EA47-FDA6-42F3-BD9F-E42186E5A960&version=2&JobAdId=".$key;
                    $xml = file_get_contents($map_url, false, $context);
                    $xml = simplexml_load_string($xml);
                    $arr = (array) $xml -> xpath('channel');
                    $item = $arr[0]->item;

                    $item = json_encode($item);
                    $item = json_decode($item);

                    // And we unconditionally update the cache with an expiration of 1 day
                    set_transient($key, $item, (12 * HOUR_IN_SECONDS) );
                    echo '<script>jQuery(".page-title").text()</script>';
                    echo "<script>jQuery(\".page-title\").text('" . $item->title  . "')</script>";

                } else {
//                    echo 'cached';
                    echo '<script>jQuery(".page-title").text()</script>';
                    echo "<script>jQuery(\".page-title\").text('" . $item->title  . "')</script>";
                }

//                echo $item->intelliplan->attributes();

                $regex = '/(\S+@\S+\.\S+)(?!\s))+/';
                $replace = '<a href="mailto:$1">$1</a>';

                ?>
<!--                <p>--><?//= nl2br(preg_replace('/((http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1">\1</a>', preg_replace($regex, $replace, $item->description))); ?><!--</p>-->
                <p class="description"><?= $item->description; ?></p>
            </div>
            <div class="col-12 col-sm-3 align-self-end">
                <div class="fancy-button btn-green">
                    <div class="left-frills frills"></div>
                    <a href="https://wapcard.se/job/<?= $key; ?>" class="button" id="apply_for_job" target="_blank">Ansök med wap card </a>
                    <div class="right-frills frills"></div>
                </div>
            </div>
            <div class="col-12">
                <p>Inom kort kommer du enbart kunna söka jobb från Maxkompetens via wap card, vi rekommenderar därför att du redan nu skapar ett wap-card för att ansöka denna tjänst.
                Vill du kan du fortfarande ansöka om tjänsten via formuläret här nedanför.
                </p>
                <p><a href="https://wapcard.se" target="_blank">Läs mer om wap card</a></p>
            </div>

            <div class="col-12">
                <iframe src="http://cv-maxkompetens.app.intelliplan.eu/JobAd/Apply?jaid=<?= $key; ?>" width="100%" height="775" scrolling="no" frameborder="0"></iframe>
            </div>
        </div>

    </div>
</section>

<?php get_template_part('templates/section', 'stats'); ?>

<?php get_template_part('templates/section', 'companies'); ?>
