<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/habitat.php';

$habitats=getHabitats($pdo);
$messages =[];
$errors =[];
?>

<h1>Gestion des habitats</h1>

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
    <?php foreach ($habitats as $habitat) {
        if (isset($_POST['deleteHabitat'.$habitat['ha_id']])) {?>
            <script> location.replace(document.referrer); </script>
            <?php
            $res = deleteHabitat($pdo, $habitat['ha_id']);
            if ($res) {
                $messages[] = 'L\'habitat a bien été supprimé';
            } else {
                $errors[] = 'Une erreur s\'est produite.';
            }
        } ?>
        <div class="row d-flex mb-3 align-items-center">
            <div class="col-sm-6 col-md-3 p-0 ps-3">
                <?= ucfirst(htmlentities($habitat["ha_name"]))?>
            </div>
            <div class="col d-flex justify-content-start">
            <div class=" p-0">
                <a class="btn btn-primary btn-sm p-1 mx-1" href="<?="habitat_add.php?id=".$habitat['ha_id']?>">Modifier</a>
            </div>
            <div class=" p-0">
                <form method="POST">
                    <button type="submit" name="deleteHabitat<?= $habitat['ha_id']?>" class="btn btn-primary btn-sm" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet habitat ?')"><img src="../assets/icones/delete.png" height="15" alt="icone-supprimer"></button>
                </form>
            </div>
            </div>
        </div>
    <?php } ?>
</div>
<a href="habitat_add.php" class="btn btn-primary btn-sm mt-3">Ajouter un habitat</a>
</div>

<?php
require_once '../templates/_footer.php'
?>