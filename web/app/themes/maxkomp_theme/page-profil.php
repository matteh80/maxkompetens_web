<?php get_template_part('templates/page', 'header-profil'); ?>
<?php get_template_part('templates/content', 'page'); ?>


<section id="profile-content">
    <div class="profile-menu container">
        <div class="row flex-items-xs-center flex-items-xs-middle text-xs-center">
            <div class="option cv m-a-1 active">
                <div class="c100" data-value="25">
                    <div class="bg"></div>
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
            </div>
            <div class="option test m-a-1">
                <div class="c100" data-value="75">
                    <div class="bg"></div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
            </div>
            <div class="option video m-a-1">
                <div class="c100" data-value="100">
                    <div class="bg"></div>
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container wrapper m-t-2" id="resume-wrapper">
        <div class="row">
            <?php get_template_part('templates/profile', 'resume'); ?>
        </div>
    </div>
</section>