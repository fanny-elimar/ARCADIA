<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/service.php';

$services=getServices($pdo);
$messages =[];
$errors =[];

?>
<div class="px-4 text-left" >
  <h2 class="display-5">Gestion des services</h2>
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

<div class="">
    <?php foreach ($services as $service) {
        if (isset($_POST['deleteService'.$service['se_id']])) {?>
            <script> location.replace(document.referrer); </script>
  <?php
            $res = deleteService($pdo, $service['se_id']);
            if ($res) {
                $messages[] = 'Le service a bien été sauvegardé';
            } else {
                $errors[] = 'Une erreur s\'est produite.';
            }
          } ?>
        
        
       <div class="row d-flex mb-0">
            <div class="col-4"><p class="" ><?= ucfirst(htmlentities($service["se_name"]))?></p></div>
            <div class="col"><a class="btn btn-primary btn-sm p-1" href="<?="service_add.php?id=".$service['se_id']?>">Modifier</a></div>
            <form method="POST">
                <input type="submit" name="deleteService<?= $service['se_id']?>" class="btn btn-primary btn-sm col-2 mb-3" value="Supprimer">
            </form>
            
       
       </div>
        <?php } ?>
        

</div>
<a href="service_add.php" class="btn btn-primary btn-sm">Ajouter un service</a>
</div>

<?php
require_once '../templates/_footer.php'
?>