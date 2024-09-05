<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/user.php';

// Start with PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
require_once '..\vendor/autoload.php';

$users=getUsers($pdo);
$messages =[];
$errors =[];

if (isset($_POST["addUser"])) { ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <?php 
    $email=$_POST['us_email'];
    $emailVerified=filter_var($email, FILTER_VALIDATE_EMAIL);
    $password=$_POST['us_password'];
    $passwordVerified=preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $password);
    $password_check=$_POST['us_password_check'];
    $role=$_POST['us_role'];
    $userExists = verifyUserExists($pdo, $_POST['us_email']);
    if (!$emailVerified) {
        $errors[] = 'Veuillez saisir une adresse mail valide.';
    } else {
        if ($userExists) {
            $errors[] = 'Un utilisateur existe déjà avec cette adresse mail.';
        } else {
            if (!$passwordVerified) {
                $errors[] = 'Le format du mot de passe n\'est pas valide';
            } else {
                if ($password!=$password_check) {
                    $errors[] = 'Les deux mots de passe ne correspondent pas. Vérifier votre saisie.';
                } else {
                    if (!$role) {
                        $errors[] = 'Veuillez sélectionner le type de compte.';
                    } else {
                        $res = addUser($pdo, $_POST['us_fname'],$_POST['us_email'],$_POST['us_password'], $_POST['us_password_check'], $_POST['us_role']);
                        if ($res) {
                            $messages[] = 'Nouvel utilisateur créé avec succès.';
                            $users=getUsers($pdo);

                            // create a new object

                            $phpmailer = new PHPMailer();
                            $phpmailer->isSMTP();
                            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
                            $phpmailer->SMTPAuth = true;
                            $phpmailer->Port = 2525;
                            $phpmailer->CharSet = 'UTF-8';
                            $phpmailer->Encoding = 'base64';
                            $phpmailer->Username = 'b172bd7e94b535';
                            $phpmailer->Password = '51262edda19843';

                            $phpmailer->setFrom('admin@arcadia.fr','José');
                            $phpmailer->addAddress($_POST['us_email'], $_POST['us_email']);
                            $phpmailer->Subject = 'Création de compte';
                            // Set HTML 
                            $phpmailer->isHTML(TRUE);
                            $phpmailer->Body = '<h4>Votre compte a été créé.</h1><p>Pour vous connecter, utilisez votre adresse mail : '.$_POST['us_email'].'.</p><p>Pour connaitre votre mot de passe, rapprochez-vous de José.</p>';
                            $phpmailer->AltBody = 'Votre compte a été créé. Pour vous connecter, utilisez votre adresse mail. Pour connaitre votre mot de passe, rapprochez-vous de José.';

                            // send the message
                            if($phpmailer->send()){
                                $messages[]= 'Un email a été envoyé au nouvel utilisateur.';
                            } else {
                                echo 'Message could not be sent.';
                                echo 'Mailer Error: ' . $phpmailer->ErrorInfo;
                            }
                        } else {
                            $errors[] = 'Une erreur s\'est produite.';
                        }
                    }
                }
            } 
        } 
    }
} 
?> 

<div class="px-0 text-left" >
    <h1 >Gestion des utilisateurs</h1>
</div>

<?php foreach ($messages as $message) { ?>
        <div class="alert alert-success" role="alert">
            <?= $message; ?>
        </div>
    <?php } ?>
    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error; ?>
        </div>
    <?php } ?>

    <div class="my-3 ms-0 p-1">
        <a class="btn btn-primary btn-sm js-button-add-user" data-bs-toggle="collapse" href="#collapseAddUser" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-addUser">Créer un compte</a>
        <div class="collapse mt-3" id="collapseAddUser">
            <form method="POST">
            <div class="mb-3 form-group row">
                    <label for="us_fname" class="col-sm-12 col-md-3 col-form-label">Prénom</label>
                    <div class=" col-md-5">
                        <input type="text" class="form-control" id="us_fname" name="us_fname" required>
                    </div>
                </div>    
            <div class="mb-3 form-group row">
                    <label for="us_email" class="col-sm-12 col-md-3 col-form-label">Email</label>
                    <div class="col-md-5">
                        <input type="email" class="form-control" id="us_email" name="us_email" required>
                    </div>
                </div>
                <div class="mb-3 form-group row d-flex align-items-center">
                    <label for="us_password" class="col-sm-12 col-md-3 col-form-label">Mot de passe</label>
                    <div class="col-md-5">
                        <input type="password" class="form-control " onfocus="document.getElementById('info-mdp').classList.remove('d-none')" onblur="document.getElementById('info-mdp').classList.add('d-none')" id="us_password" name="us_password" required minlength="12">  
                    </div>
                        <p id="info-mdp" class="text-info d-none small">Le mot de passe doit contenir au moins 12 caractères, dont au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial.</p>
                </div>
                <div class="mb-3 form-group row">
                    <label for="us_password_check" class="col-sm-12 col-md-3 col-form-label">Retaper le mot de passe</label>
                    <div class="col-md-5">
                        <input type="password" class="form-control" id="us_password_check" name="us_password_check" required minlength="12">
                    </div>
                </div>
                <div class="mb-3 form-group col-10">
                    <select type="text" class="form-control primary" id="us_role" name="us_role" required>
                        <option value="" class="primary">Type de compte ▾</option>    
                        <option value="employe" class="primary" >employé</option>
                        <option value="vet" class="primary">vétérinaire</option>
                    </select>
                </div>
                <input type="submit" name="addUser" class="btn btn-primary btn-sm col" value="Créer">
            </div>
        </form>
    </div>


<div class="container d-flex flex-wrap justify-content-around">
    <?php foreach ($users as $user) {
        if (isset($_POST["deleteUser".$user['us_id']])) { ?>
            <!--empecher le renvoi du formulaire à l'actualisation de la page-->
            <script> location.replace(document.referrer); </script>
            <?php 
            $res = deleteUser($pdo, $user['us_id']);
            if ($res) {
                $messages[] = 'Merci pour votre avis.';
            } else {
                $errors[] = 'Une erreur s\'est produite.';
            }
        } ?> 
        <?php require 'templates/_user_card.php'; ?> 
    <?php ;}?>
</div>
    </div>
</div>


<?php
require_once '../templates/_footer.php'
?>
