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
    if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
      } else {
        $page = 1;
      }
    $ha_id=$_GET['ha'];

    $offset=($page-1)*10;
    
    $animals=getAnimalsByHabitat($pdo, $ha_id, 10, $offset);
    $total = getNumberOfAnimalsPerHabitat($pdo, $ha_id);
    $totalPages = ceil($total/10);
    
    var_dump($totalPages)
    ?>



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
    





<nav aria-label="Page navigation ">
  <ul class="pagination">
    <?php if ($totalPages > 1) { ?>
      <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
        <li class="page-item">
          <a class="page-link <?php if ($i == $page) { echo " active";} ?>" href="?ha=<?=$ha_id; ?>&page=<?php echo $i; ?>" >
            <?php echo $i; ?>
          </a>
        </li>
      <?php } ?>
    <?php } ?>
  </ul>
</nav>
</div>
</div>
</div>
<?php ;}?>


<?php
require_once '../templates/_footer.php'
?>