<?php
require_once 'recaptcha/autoload.php';

if (isset($_POST['submitpost'])) {

    if (isset($_POST['g-recaptcha-response'])) {
    
        $recaptcha = new \ReCaptcha\ReCaptcha('6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            var_dump('Captcha valide');
        } else {
            $errors = $resp->getErrorCodes();
            var_dump('Captcha invalide');
            var_dump('errors');
        
        }
    }else{
        var_dump('captcha non rempli');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Contactez-moi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- script recaptcha google -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <!-- script jquery ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- script bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- link css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- link javascript -->
    <script src="js/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Contactez-moi</h2>
        </div>
        <form id="contact-form" method="post" action="" role="form">
            <div class="row">
                <div class="col-lg-6">
                    <label for="firstname" class="form-label">Prénom <span class="blue">*</span></label>
                    <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom">
                    <p class="comments"></p>
                </div>
                <div class="col-lg-6">
                    <label for="name" class="form-label">Nom <span class="blue">*</span></label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom">
                    <p class="comments"></p>
                </div>
                <div class="col-lg-6">
                    <label for="email" class="form-label">Email <span class="blue">*</span></label>
                    <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email">
                    <p class="comments"></p>
                </div>
                <div class="col-lg-6">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input id="phone" type="text" name="phone" class="form-control" placeholder="Votre Téléphone">
                    <p class="comments"></p>
                </div>
                <div>
                    <label for="message" class="form-label">Message <span class="blue">*</span></label>
                    <textarea id="message" name="message" class="form-control" placeholder="Votre Message"
                        rows="4"></textarea>
                    <p class="comments"></p>
                </div>
                <div>
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>
                <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                <br />
                <input type="submit" class="button1" value="Envoyer" name="submitpost">
                <div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>