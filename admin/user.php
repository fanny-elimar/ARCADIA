<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/user.php';

$users=getUsers($pdo)
?>

<div class="px-4 text-left" >
  <h1 class="display-5 ">Gestion des utilisateurs</h1>
</div>
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
        
        <div class="row">
        <p class="col-2"><?= $user['us_fname'];?></p>
    <p class="col-3"><?= $user['us_email'];?></p>
    <p class="col-2"><?= $user['us_role'];?></p>
    
        <div class="col">
            <form method='POST'>
            <input type="submit" name="<?php echo 'deleteUser'.$user['us_id'];?>" class="btn btn-primary btn-sm col" value="Supprimer">
            </form>
        </div>
 
    </div>
    <?php ;}?>
</div>
</div>


</div>

<?php
require_once '../templates/_footer.php'
?>