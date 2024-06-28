<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/user.php';

$users=getUsers($pdo);
$messages =[];
$errors =[];



if (isset($_POST["addUser"])) { ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->

    <?php 

$password=$_POST['us_password'];
$password_check=$_POST['us_password_check'];
$role=$_POST['us_role'];
$userExists = verifyUserExists($pdo, $_POST['us_email']);
if ($userExists) {
    $errors[] = 'Un utilisateur existe déjà avec cette adresse mail.';
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
        } else {
            $errors[] = 'Une erreur s\'est produite.';
        }
    }
} 
} 
} ?> 

<div class="px-4 text-left" >
  <h2 class="display-5">Gestion des utilisateurs</h2>
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

<div>
    <?php foreach ($users as $user) {
        if (isset($_POST["deleteUser".$user['us_id']])) { ?>
            <!--empecher le renvoi du formulaire à l'actualisation de la page-->
            <script> location.replace(document.referrer); </script>
            <?php 
            $res5 = deleteUser($pdo, $user['us_id']);
            if ($res5) {
                $messages[] = 'Merci pour votre avis.';
            } else {
                $errors[] = 'Une erreur s\'est produite.';
            }
        } ?> 
        
        <div class="d-flex flex-wrap border-top align-items-center py-2">
        <div class=""><?= $user['us_fname'];?></div>
    <div class=""><?= $user['us_email'];?></div>
    <div class=""><?= $user['us_role'];?></div>
    
        <div class="">
            <form method='POST'>
            <button type="submit" name="<?php echo 'deleteUser'.$user['us_id'];?>" class="btn btn-primary btn-sm col" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')"><img src="../assets/icones/delete.png" height="15"></button>
            </form>
        </div>
 
    </div>
    <?php ;}?>
    <div>
        <a class="btn btn-primary btn-sm js-button-add-user col mt-5" data-bs-toggle="collapse" href="#collapseAddUser" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-addUser">Créer un compte</a>
        <div class="collapse mt-3" id="collapseAddUser">
            <form method="POST">
            <div class="mb-3 form-group row">
                    <label for="us_fname" class="col-sm-2 col-form-label">Prénom</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="us_fname" name="us_fname">
                    </div>
                </div>    
            <div class="mb-3 form-group row">
                    <label for="us_email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="us_email" name="us_email">
                    </div>
                </div>
                <div class="mb-3 form-group row">
                    <label for="us_password" class="col-sm-3 col-form-label">Mot de passe</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="us_password" name="us_password">
                    </div>
                </div>
                <div class="mb-3 form-group row">
                    <label for="us_password_check" class="col-sm-3 col-form-label">Mot de passe</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="us_password_check" name="us_password_check">
                    </div>
                </div>
                <div class="mb-3 form-group col-3">
                    <select type="text" class="form-control col-3 text-primary" id="us_role" name="us_role">
                    <option value="">Type de compte</option>    
                    <option value="employe">employé</option>
                        <option value="vet">vétérinaire</option>
                    </select>
                </div>
                <input type="submit" name="addUser" class="btn btn-primary btn-sm col" value="Créer">

            </form>
        </div>
    </div>
</div>
</div>


</div>

<?php
require_once '../templates/_footer.php'
?>