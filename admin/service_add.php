<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/service.php';


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
        <form method="POST">
        <div class="form-group row">
            <label for="se_name" class="col-sm-2 col-form-label mb-3">Service</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="se_name" name="se_name" value="<?= $service['se_name'];?>">
        </div>
        <div class="form-group row">
            <label for="se_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-8">
            <textarea type="text" class="form-control  mb-3" id="se_description" name="se_description" rows=7 ><?= $service['se_description'];?></textarea>
        </div>
        <div class="form-group row">
            <label for="se_info" class="col-sm-2 col-form-label">Détails</label>
            <div class="col-sm-8">
            <textarea type="text" class="form-control  mb-3" id="se_info" name="se_info" rows=5><?= $service['se_info'];?></textarea>
        </div> 
        <div class="form-group row">
            <label for="se_images" class="col-sm-2 col-form-label mb-3">Image</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="se_images" name="se_images">
        </div>
        <div class="form-group row">
        <input type="submit" name="addService" class="btn btn-primary btn-sm col-2 mb-3" value="Valider">
        </div>
        </form>
        </div>
          
<?php } else { ?>
  <h1>Page introuvable</h1>
<?php } ?>
</div>

<?php
require_once "templates/_footer.php";