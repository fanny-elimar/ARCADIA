<?php
require_once __DIR__ ."/templates/_header.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/service.php";


$error = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $service = getServiceById($pdo, $id);

    if (!$service) {
        $error = true;
    }
} else {
    $error = true;
}

if (isset($_POST['modifyService'])) { ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace(document.referrer); </script>
    <?php 
    $res10 = modifyService($pdo, $service['se_id'], $_POST['se_info']);
    if ($res10) {
        $messages[] = 'Merci pour votre avis.';
    } else {
        $errors[] = 'Une erreur s\'est produite.';
    }
} ?>



<?php if (!$error) { ?>

        <div >
            <h1 class="mb-3"><?=ucfirst(htmlentities($service["se_name"])); ?></h1>
            <p><?=nl2br(htmlentities($service["se_description"])); ?></p>
        </div>
<div class="d-flex justify-content-center">
    <img src="<?=_ASSETS_IMAGES_FOLDER_.$service['se_images'];?>">
</div>


<h3>Info pratiques</h3>

<p><?= nl2br(htmlentities($service["se_info"])); ?></p>
<?php if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['us_role']=='employe') { ?>
        <a class="btn btn-primary btn-sm js-button-modifier-services mb-3" data-bs-toggle="collapse" href="#collapseModifyService" role="button" aria-expanded="false" aria-controls="collapseExample" id="button-modifier-services">
    Modifier
  </a>
  <div class="collapse" id="collapseModifyService">
    <form method="POST">
        <textarea rows="4" class="form-control mb-3" name="se_info"><?= $service['se_info'];?></textarea>
        <input type="submit" value="Valider" name="modifyService" class="btn btn-primary btn-sm">
    </form>
  </div>
    <?php }
}?>

        

<?php } else { ?>
    <h1>Page introuvable</h1>
<?php } ?>

<?php
require_once __DIR__ ."/templates/_footer.php";