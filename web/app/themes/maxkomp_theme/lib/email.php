<?php

use Sendinblue\Mailin;

if ( !empty($_POST)  ) {
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","OA00cUC5RZL3mzH8");
    $data = array( "to" => array("mathias.hedstrom@maxkompetens.se"=>"to whom!"),
        "from" => array($_POST['email'], $_POST['email']),
        "subject" => "Mail från maxkompetens.se",
        "html" => $_POST['message']
    );

    $mailin->send_email($data);

}