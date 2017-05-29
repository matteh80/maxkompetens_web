<?php

use Sendinblue\Mailin;
use Roots\Sage;

//if(isset($_POST['submit'])){
////    $to = "mathias.hedstrom@maxkompetens.se"; // this is your Email address
////    $from = $_POST['email']; // this is the sender's Email address
////    $first_name = $_POST['name'];
////    $subject = "Form submission";
////    $subject2 = "Copy of your form submission";
////    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
////    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];
////
////    $headers = "From:" . $from;
////    $headers2 = "From:" . $to;
////    wp_mail($to,$subject,$message,$headers);
//////    wp_mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
////    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
////    // You can also use header('Location: thank_you.php'); to redirect to another page.
//
//    Sage\Extras\debug_to_console('hejhej');
//    return;
//
//    $mailin = new Mailin("https://api.sendinblue.com/v2.0","OA00cUC5RZL3mzH8");
//    $data = array( "to" => array("mathias.hedstrom@maxkompetens.se"=>"to whom!"),
//        "from" => array("admin@maxkompetens.se", "from email!"),
//        "subject" => "My subject",
//        "html" => "This is the <h1>HTML</h1>"
//    );
//
//    var_dump($mailin->send_email($data));
//}

    global $post;

    $page = $post->post_name;
?>

<section id="contact" class="bg-blue cloud cloud-l-b">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center fg-white">
                <h2 class="text-uppercase mb-5">Kontakta oss direkt</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="alert alert-success" id="email_sent" role="alert" style="display: none">
                    Ditt meddelande har skickats och vi återkommer så snart som möjligt.
                </div>
                <div class="alert alert-danger" id="email_error" role="alert" style="display: none">
                    Något gick fel, försök igen eller kontakta ett kontor via kontaktuppgifterna till höger.
                </div>
                <form id="contact_form" name="contact_form">
                    <?php if ($page !== 'bemanning') :?>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Namn *" required />
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($page === 'bemanning') :?>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="foretag" name="foretag" aria-describedby="foretagHelp" placeholder="Företag *" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="kontaktperson" name="kontaktperson" aria-describedby="kontaktpersonHelp" placeholder="Kontaktperson *" required />
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="E-post *" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <textarea class="form-control" rows="4" id="message" name="message" aria-describedby="messageHelp" placeholder="Meddelande *" required></textarea>
                        </div>
                    </div>
                    <div id="recaptchaWrapper"></div>
                    <div class="row">
                        <div class="col-12 col-sm-3 align-self-end">
                            <div class="fancy-button btn-white">
                                <div class="left-frills frills"></div>
                                <button class="button" id="send_mail" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Skickar...">Skicka</button>
                                <div class="right-frills frills"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-5">
                <div class="col-12 contact-side py-4 px-4">
                    <h5 style="font-weight: 100 !important;">Ring oss på <a href="tel:081234567">08-120 753 00</a></h5>
                    <h5 style="font-weight: 100 !important;">Maila oss på <a href="mailto:sverige@maxkompetens.se">sverige@maxkompetens.se</a></h5>
                    <div class="row">
                        <?php
                        $args = array( 'post_type' => 'office', 'posts_per_page' => -1 );
                        $loop = new WP_Query( $args );

                        while ( $loop->have_posts() ) : $loop->the_post();
                            $phone = get_post_meta($post->ID, 'maxkomp_office_phone', true);
                            echo '<div class="col-6"><h6 style="margin-bottom: 0">'.get_the_title().'</h6>';
                            echo '<a href="tel:'.$phone.'">'.$phone.'</a></div>';
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>

            <div class="paper-plane will-animate hidden-sm-down" data-class="fadeInRightBig" data-delay="1000">
                <img src="<?= \Roots\Sage\Assets\asset_path('images/paper_plane.png'); ?>" class="img-fluid" />
            </div>

<!--            <script type="text/javascript">-->
<!--              var onloadCallback = function() {-->
<!--                grecaptcha.render('recaptchaWrapper', {-->
<!--                  'sitekey' : '6LegSyMUAAAAAJkYiHc4SlPBTOQ-FLq34R5eABeb',-->
<!--                  'callback' : correctCaptcha-->
<!--                });-->
<!--              };-->
<!--            </script>-->
<!---->
<!--            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"-->
<!--                    async defer>-->
<!--            </script>-->
        </div>
    </div>
</section>