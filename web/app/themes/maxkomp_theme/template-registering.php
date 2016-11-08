<?php
/**
 * Template Name: Registering
 */
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>

<section id="registering">
    <div class="container">
        <div class="row flex-items-xs-center flex-items-xs-middle social m-b-3">
            <a href="#"><i class="fa fa-facebook-official"></i></a>
            <a href="#" class="m-x-1"><i class="fa fa-linkedin-square"></i></a>
            <a href="#"><i class="fa fa-google-plus-official"></i></a>
        </div>
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <form class="col-xs-12 col-sm-10 col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        <input type="email" class="form-control" id="exampleInputAmount" placeholder="E-post">
                    </div>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary col-xs-4">Submit</button>
            </form>
        </div>
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <ol class="subpage-indicators m-t-3">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
            </ol>
        </div>
    </div>
</section>
