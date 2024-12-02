<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/service.php';

$services=getServices($pdo);
$messages =[];
$errors =[];
?>

<h1>Gestion des services</h1>

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
        <div class="row d-flex mb-3 align-items-center">
            <div class="col-5 p-0 ps-3">
                <?= ucfirst(htmlentities($service["se_name"]))?>
            </div>
            <div class="col d-flex justify-content-start">
                <div class=" p-0">
                    <a class="btn btn-primary btn-sm p-1 mx-1" href="<?="service_add.php?id=".$service['se_id']?>">Modifier</a>
                </div>
                <div class=" p-0">
                    <form method="POST">
                        <button type="submit" name="deleteService<?= $service['se_id']?>" class="btn btn-primary btn-sm" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')"><img src="../assets/icones/delete.png" height="15" alt="icone-supprimer"></button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<a href="service_add.php" class="btn btn-primary btn-sm mt-3">Ajouter un service</a>
</div>

<?php
require_once '../templates/_footer.php'
?>