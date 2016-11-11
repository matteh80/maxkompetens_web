<?php
/**
 * Template Name: Registering
 */
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>

<section id="registrering">
    <div class="container card">

        <div class="row flex-items-xs-center flex-items-xs-middle social m-b-3">
            <a href="#"><i class="fa fa-facebook-official btn-facebook"></i></a>
            <a href="#" class="m-x-1"><i class="fa fa-linkedin-square"></i></a>
            <a href="#"><i class="fa fa-google-plus-official"></i></a>
        </div>
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <form class="col-xs-12 col-sm-10 col-md-6" id="register_form">

                <div class="tab-content">
                    <div class="tab-pane fade in active" id="page0" role="tabpanel">
<!--                        <form id="register_form">-->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-post" required>
                                </div>
<!--                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with-->
<!--                                    anyone else.-->
<!--                                </small>-->
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Lösenord (minst 8 tecken)" minlength="8" pattern=".{8,}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Bekräfta lösenord" minlength="8" pattern=".{8,}" required>
                                </div>
                            </div>

<!--                        </form>-->
                    </div>


<!--                    PERSONUPPGIFTER-->

                    <div class="tab-pane fade" id="page1" role="tabpanel">
                        <h4 class="will-animate" data-class="fadeInUp">Personuppgifter</h4>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="firstname" placeholder="Förnamn">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="lastname"
                                       placeholder="Efternamn">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="tel" class="form-control" id="exampleInputPassword1"
                                       placeholder="Telefon">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Plats">
                            </div>
                        </div>

                    </div>


<!--                    ANSTÄLLNINGAR-->

                    <div class="tab-pane fade" id="page2" role="tabpanel">
                        <h4 class="will-animate" data-class="fadeInUp">Anställning 1</h4>
                        <div class="form-group will-animate" data-class="fadeInUp"">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Företag">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="exampleInputAmount"
                                       placeholder="Befattning">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control" id="exampleInputAmount"
                                       placeholder="Startdatum">
                                <i class="fa fa-arrow-right m-x-1"></i>
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control" id="exampleInputAmount"
                                       placeholder="Slutdatum">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Arbetsuppgifter"></textarea>
                            </div>
                        </div>

                        <h4 class="will-animate" data-class="fadeInUp">Anställning 2</h4>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Företag">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="exampleInputAmount"
                                       placeholder="Befattning">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control" id="exampleInputAmount"
                                       placeholder="Startdatum">
                                <i class="fa fa-arrow-right m-x-1"></i>
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control" id="exampleInputAmount"
                                       placeholder="Slutdatum">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Arbetsuppgifter"></textarea>
                            </div>
                        </div>
                    </div>



<!--                    UTBILDNINGAR-->
                    <div class="tab-pane fade" id="page3" role="tabpanel">
                        <h4 class="will-animate" data-class="fadeInUp">Utbildning 1</h4>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Skola">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                <input type="text" class="form-control" id="exampleInputAmount"
                                       placeholder="Utbildning">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control" id="exampleInputAmount"
                                       placeholder="Startdatum">
                                <i class="fa fa-arrow-right m-x-1"></i>
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control" id="exampleInputAmount"
                                       placeholder="Slutdatum">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                        </div>

                        <h4 class="will-animate" data-class="fadeInUp">Utbildning 2</h4>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Skola">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                <input type="text" class="form-control" id="exampleInputAmount"
                                       placeholder="Utbildning">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control" id="exampleInputAmount"
                                       placeholder="Startdatum">
                                <i class="fa fa-arrow-right m-x-1"></i>
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control" id="exampleInputAmount"
                                       placeholder="Slutdatum">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                        </div>
                    </div>


                    <!--                    VÄRDEORD-->
                    <div class="tab-pane fade" id="page4" role="tabpanel">
                        <h4 class="will-animate" data-class="fadeInUp">Personlighet</h4>
                        <div class="form-group will-animate slider-values" data-class="fadeInUp">
                            <small class="col-xs left">Social</small>
                            <small class="col-xs right">Ensamvarg</small>
                            <div class="col-xs-12 slider" id="slider1"></div>
                        </div>

                        <div class="form-group will-animate slider-values" data-class="fadeInUp">
                            <small class="col-xs left">Fyrkantig</small>
                            <small class="col-xs right">Kreativ</small>
                            <div class="col-xs-12 slider" id="slider2"></div>
                        </div>

                        <div class="form-group will-animate slider-values" data-class="fadeInUp">
                            <small class="col-xs">Kompetent</small>
                            <small class="col-xs">Inkompetent</small>
                            <div class="col-xs-12 slider" id="slider2"></div>
                        </div>

                        <div class="form-group will-animate slider-values" data-class="fadeInUp">
                            <small class="col-xs">Kaffedrickare</small>
                            <small class="col-xs">Jag gillar te</small>
                            <div class="col-xs-12 slider" id="slider2"></div>
                        </div>

                        <div class="form-group will-animate slider-values" data-class="fadeInUp">
                            <small class="col-xs">Pest</small>
                            <small class="col-xs">Kolera</small>
                            <div class="col-xs-12 slider" id="slider2"></div>
                        </div>
                    </div>


<!--                    FRÅGOR-->
                    <div class="tab-pane fade" id="page5" role="tabpanel">
                        <h4 class="will-animate" data-class="fadeInUp">Vad är ditt drömjobb?</h4>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                        </div>

                        <h4 class="will-animate" data-class="fadeInUp">Vad heter din hund?</h4>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="next_btn" class="btn btn-primary col-xs-12 m-y-3">Fortsätt</button>
            </form>
        </div>
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <ul class="nav nav-tabs subpage-indicators m-t-3">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#page0" role="tab"></a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Personuppgifter">
                    <a class="nav-link" data-toggle="tab" href="#page1" role="tab"></a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Anställningar">
                    <a class="nav-link" data-toggle="tab" href="#page2" role="tab"></a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Utbildning">
                    <a class="nav-link" data-toggle="tab" href="#page3" role="tab"></a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Personlighet">
                    <a class="nav-link" data-toggle="tab" href="#page4" role="tab"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#page5" role="tab"></a>
                </li>
            </ul>
        </div>
    </div>
</section>
