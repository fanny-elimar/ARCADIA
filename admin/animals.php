<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/animal.php';
require_once '../lib/habitat.php';

$messages =[];
$errors =[];
$habitats = getHabitats($pdo);








?>




<div class="px-4 text-left" >
  <h2 class="display-5">Gestion des animaux</h2>
</div>
<div class="d-flex">
<?php foreach ($habitats as $habitat) { ?>

    <a href="animals.php?ha=<?=$habitat['ha_id'];?>" class="btn btn-primary btn-sm m-3" ><?= $habitat['ha_name'];?></a>

<?php ;}?>

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

    <div class="container container-flux my-3 ms-3 p-1">
    <a href="animal_add.php" class="btn btn-primary btn-sm mt-3">Ajouter un animal</a>
        </div>
 
<?php       if (isset($_GET['ha'])) {
    $ha_id=$_GET['ha'];
    $animals=getAnimalsByHabitat($pdo, $ha_id);?>



<div class="container container-flux d-flex flex-wrap justify-content-around">
    <?php foreach ($animals as $animal) {
        if (isset($_POST["deleteAnimal".$animal['an_id']])) { ?>
            <!--empecher le renvoi du formulaire à l'actualisation de la page-->
            <script> location.replace(document.referrer); </script>
            <?php 
            $res5 = deleteAnimal($pdo, $animal['an_id']);
            if ($res5) {
                $messages[] = 'L\'animal a bien été supprimé';
            } else {
                $errors[] = 'Une erreur s\'est produite.';
            }
        } ?> 
        
        
<?php require 'templates/_animal_card.php'; ?> 
 
 
    <?php ;}?>
</div>
    
</div>
</div>


</div>
<?php ;}?>
<?php
require_once '../templates/_footer.php'
?>