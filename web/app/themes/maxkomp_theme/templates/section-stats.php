<section class="stats bg-blue waves waves-t waves-b">
    <div class="container">
        <div class="row align-items-center">
            <?php
            $stats_meta = maxkomp_get_option('stats');
            $size =count($stats_meta);
            $offset = (6-$size);
            echo '<div class="col-sm-'.$offset.'"></div>';
            foreach ($stats_meta as $stat):
                ?>
                <div class="col-xs-12 col-sm text-center text-white will-animate" data-class="fadeInUp">
                    <h3 class="display-2 value count-up" data-value="<?= $stat['stat'];?>"></h3>
                    <span><?= $stat['title'];?></span>
                </div>
                <?php
            endforeach;
            echo '<div class="col-sm-'.$offset.'"></div>';
            ?>
        </div>
    </div>
</section>