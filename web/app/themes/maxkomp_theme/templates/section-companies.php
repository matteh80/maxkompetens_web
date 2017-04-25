<section class="companies">
    <div class="container-fluid">
        <div class="row flex-items-xs-middle">
            <div id="slideouter">
                <div id="slideshow">
                    <?php
                    $folder = get_template_directory()."/dist/images/logos";
                    if ($dir = opendir($folder)) {
                        $images = array();
                        while (false !== ($file = readdir($dir))) {
                            if ($file != "." && $file != "..") {
                                $images[] = $file;
                            }
                        }
                        closedir($dir);
                    }
                    foreach($images as $image) : ?>
                        <img src="<?= \Roots\Sage\Assets\asset_path('images/logos/'.$image); ?>" class="slideimage">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row controls hidden-xs-up">
            <div id="actions">
                <a id="prev" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                <a id="next" href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>