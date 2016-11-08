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

            <div class="tab-content" id="myTab">
                <div class="tab-pane fade in active" id="page1" role="tabpanel">
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
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" aria-describedby="passwordHelpInline">
                            <small id="passwordHelpInline" class="text-muted">
                                Must be 8-20 characters long.
                            </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="page2" role="tabpanel">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Förnamn">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Efternamn">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefon">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Plats">
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="page3" role="tabpanel">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Företag">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Befattning">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="page4" role="tabpanel"><?php get_template_part('templates/cv/tab', 'employments'); ?></div>
                <button type="button" id="next_btn" class="btn btn-primary col-xs-12">Fortsätt</button>
            </div>

            </form>
        </div>
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <ul class="nav nav-tabs subpage-indicators m-t-3">
                <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Personuppgifter">
                    <a class="nav-link active" data-toggle="tab" href="#page1" role="tab"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#page2" role="tab"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#page3" role="tab"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#page4" role="tab"></a>
                </li>
            </ul>
        </div>
    </div>
</section>
