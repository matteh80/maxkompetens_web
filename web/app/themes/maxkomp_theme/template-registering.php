<?php
/**
 * Template Name: Registering
 */
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>

<section id="registrering">
    <div class="container">

        <div class="row flex-items-xs-center flex-items-xs-middle social m-b-3">
            <a href="#"><i class="fa fa-facebook-official btn-facebook"></i></a>
            <a href="#" class="m-x-1"><i class="fa fa-linkedin-square"></i></a>
            <a href="#"><i class="fa fa-google-plus-official"></i></a>
        </div>
        <div class="row flex-items-xs-center flex-items-xs-middle">
            <div class="tab-content col-xs-12 col-lg-9">
                    <div class="tab-pane fade" id="page0" role="tabpanel">
                        <form class="" id="register_form_page_0">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-post" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Lösenord (minst 8 tecken)" minlength="8" pattern=".{8,}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Bekräfta lösenord" minlength="8" pattern=".{8,}" required>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="agree" name="agree" required />
                                <label class="form-check-label" for="agree"><span></span>Jag godkänner användarvillkoren och bla bla bla</label>
                            </div>
                            <button type="submit" id="next_btn" class="next_btn btn btn-primary col-xs-12 m-y-3">Fortsätt</button>
                        </form>
                    </div>


<!--                    PERSONUPPGIFTER-->

                    <div class="tab-pane fade" id="page1" role="tabpanel">
<!--                        <i class="fa fa-user top-icon"></i>-->
                        <div class="col-sm-4 offset-sm-4">
                            <img src="<?= \Roots\Sage\Assets\asset_path('images/rocket.png');?>" class="img-fluid" style="width: 100%;"/>
                        </div>
                        <form id="register_form_page_1">
                            <h4 class="will-animate" data-class="fadeInUp">Personuppgifter</h4>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Förnamn" required>
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                           placeholder="Efternamn" required>
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="adress" name="adress" placeholder="Adress" required>
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="co_adress" name="co_adress" placeholder="C/o">
                                </div>
                            </div>
                            <div class="form-group will-animate row" data-class="fadeInUp">
                                <div class="input-group col-xs-4">
                                    <input type="number" class="form-control" id="zipcode" name="zipcode" placeholder="Postnummer">
                                </div>
                                <div class="input-group col-xs">
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Stad">
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telefon" required>
                                </div>
                            </div>
                            <div class="form-check will-animate" data-class="fadeInUp">
                                <input type="checkbox" id="actively_searching" name="actively_searching" />
                                <label class="form-check-label" for="actively_searching"><span></span>Jag söker jobb <u>aktivt</u></label>
                            </div>
                            <button type="submit" id="next_btn" class="next_btn btn btn-primary col-xs-12 m-y-3">Fortsätt</button>
                        </form>
                    </div>


<!--                    ANSTÄLLNINGAR-->

                    <div class="tab-pane fade" id="page2" role="tabpanel">
                        <i class="fa fa-briefcase top-icon"></i>
                        <form id="register_form_page_2" class="jobs-form">
                            <h4 class="will-animate" data-class="fadeInUp">Anställning 1</h4>
                            <div class="form-group will-animate" data-class="fadeInUp"">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="employer" name="employer" placeholder="Företag">
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Yrkeskategori">
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Befattning">
                                </div>
                            </div>
                            <div class="form-group will-animate row flex-items-xs-middle" data-class="fadeInUp">
                                <div class="input-group col-sm-5 col-md-4">
                                    <input type="date" class="form-control " id="start_date" name="start_date" placeholder="Startdatum">
                                </div>
                                    <i class="fa fa-arrow-right m-x-1"></i>
                                <div class="input-group col-sm-5 col-md-4">
                                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Slutdatum">
                                </div>
                            </div>
                            <div class="form-check will-animate" data-class="fadeInUp">
                                <div class="col-xs">
                                    <input type="checkbox" id="current" name="current" />
                                    <label class="form-check-label col-xs" for="current"><span></span>Nuvarande anställning</label>
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Arbetsuppgifter"></textarea>
                                </div>
                            </div>


                            <h4 class="will-animate" data-class="fadeInUp">Anställning 2</h4>
                            <div class="form-group will-animate" data-class="fadeInUp"">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="employer2" name="employer2" placeholder="Företag">
                                </div>
                            </div>

                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="occupation2" name="occupation2" placeholder="Yrkeskategori">
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="befattning2" name="befattning2" placeholder="Befattning">
                                </div>
                            </div>
                            <div class="form-group will-animate container" data-class="fadeInUp">
                                <div class="input-group row flex-items-xs-middle">
                                    <input type="date" class="form-control col-sm-4" id="start_date2" name="start_date2" placeholder="Startdatum">
                                    <i class="fa fa-arrow-right m-x-1"></i>
                                    <input type="date" class="form-control col-sm-4" id="end_date2" name="end_date2" placeholder="Slutdatum">
                                </div>
                            </div>
                            <div class="form-group will-animate" data-class="fadeInUp">
                                <div class="input-group">
                                    <textarea class="form-control" id="description2" name="description2" rows="3" placeholder="Arbetsuppgifter"></textarea>
                                </div>
                            </div>
                            <div class="form-check will-animate" data-class="fadeInUp">
                                <input type="checkbox" id="no-jobs" name="no-jobs" />
                                <label class="form-check-label" for="no-jobs"><span></span>Jag har ingen tidigare arbetslivserfarenhet</label>
                            </div>
                            <button type="submit" id="next_btn" class="next_btn btn btn-primary col-xs-12 m-y-3">Fortsätt</button>
                        </form>
                    </div>


<!--                    UTBILDNINGAR-->
                    <div class="tab-pane fade" id="page3" role="tabpanel">
                        <i class="fa fa-graduation-cap top-icon"></i>
                        <h4 class="will-animate" data-class="fadeInUp">Utbildning 1</h4>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Skola">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputAmount"
                                       placeholder="Utbildning">
                            </div>
                        </div>
                        <div class="form-group row will-animate" data-class="fadeInUp">
<!--                            <label for="exampleSelect2">Example multiple select</label>-->
                            <div class="input-group  col-sm-5 col-md-4">
                                <select class="form-control" id="exampleSelect2" placeholder="Nivå">
                                    <option value="university">Universitet / Högskola</option>
                                    <option value="single_courses">Enstaka Kurser</option>
                                    <option value="hogh_school">Gymnasium</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group will-animate row flex-items-xs-middle" data-class="fadeInUp">
                            <div class="input-group col-sm-5 col-md-4">
                                <input type="date" class="form-control " id="start_date" name="start_date" placeholder="Startdatum">
                            </div>
                            <i class="fa fa-arrow-right m-x-1"></i>
                            <div class="input-group col-sm-5 col-md-4">
                                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Slutdatum">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Beskrivning"></textarea>
                            </div>
                        </div>

                        <h4 class="will-animate" data-class="fadeInUp">Utbildning 2</h4>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Skola">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputAmount"
                                       placeholder="Utbildning">
                            </div>
                        </div>
                        <div class="form-group row will-animate" data-class="fadeInUp">
                            <!--                            <label for="exampleSelect2">Example multiple select</label>-->
                            <div class="input-group  col-sm-5 col-md-4">
                                <select class="form-control" id="exampleSelect2" placeholder="Nivå">
                                    <option value="university">Universitet / Högskola</option>
                                    <option value="single_courses">Enstaka Kurser</option>
                                    <option value="hogh_school">Gymnasium</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group will-animate row flex-items-xs-middle" data-class="fadeInUp">
                            <div class="input-group col-sm-5 col-md-4">
                                <input type="date" class="form-control " id="start_date" name="start_date" placeholder="Startdatum">
                            </div>
                            <i class="fa fa-arrow-right m-x-1"></i>
                            <div class="input-group col-sm-5 col-md-4">
                                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Slutdatum">
                            </div>
                        </div>
                        <div class="form-group will-animate" data-class="fadeInUp">
                            <div class="input-group">
                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Beskrivning"></textarea>
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
                    <div class="tab-pane fade in active" id="page5" role="tabpanel">
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
