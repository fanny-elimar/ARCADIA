<?php

require_once __DIR__ . "/templates/_header.php";
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = 'b172bd7e94b535';
$phpmailer->Password = '51262edda19843';

if (isset($_POST['contact'])) {
    $phpmailer->setFrom(htmlentities($_POST['contact_mail']),htmlentities($_POST['contact_name']) );
    $phpmailer->addAddress('fanny.thenault@gmail.com', 'Me');
    $phpmailer->Subject = htmlentities($_POST['contact_title']);
    $phpmailer->isHTML(TRUE);
    $phpmailer->Body = htmlentities($_POST['contact_text']);
    $phpmailer->AltBody = htmlentities($_POST['contact_text']);
    if($phpmailer->send()){
        echo 'Message has been sent';
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $phpmailer->ErrorInfo;
    }
} ?>

<div class="">
    <h3 class="mt-3">Formulaire de contact</h3>
    <p>Une question ? Une remarque ? Laissez-nous un message, nous y répondrons dans les plus brefs délais.</p>
    <div class="border p-3 rounded">
        <form name="contact" method="POST" class="row">
            <div class="mb-3 form-group row">
                <label for="contact_name" class="col-sm-3 col-md-2 col-form-label">Votre nom</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="contact_name" name="contact_name">
                </div>
            </div>        
            <div class="mb-3 form-group row">
                <label for="contact_title" class="col-sm-3 col-md-2 col-form-label">Sujet</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="contact_title" name="contact_title">
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label for="contact_text" class="col-sm-3 col-md-2 col-form-label">Message</label>
                <div class="col-sm-8">
                    <textarea class="form-control date" rows="10" id="contact_text" name="contact_text" required></textarea>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label for="contact_mail" class="col-sm-3 col-md-2 col-form-label">Adresse mail</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" rows="4" id="contact_mail" name="contact_mail" required>
                </div>
            </div>
            <input type="submit" name="contact" class="btn btn-primary btn-sm col-2" value="Envoyer">
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/templates/_footer.php"; ?>