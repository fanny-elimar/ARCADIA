<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/animal.php';
require_once '../lib/habitat.php';

$messages =[];
$errors =[];
$habitats = getHabitats($pdo);
if (isset($_GET['ha'])) {
  $activePage = $_GET['ha'];
}
?>


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

  <div class="px text-center" >
    <h1>Gestion des animaux</h1>
  </div>
  <div class="row">
    <div class="d-flex col-md-8 justify-content-center justify-content-md-start">
      <?php foreach ($habitats as $habitat) { ?>
        <a href="animals.php?ha=<?=htmlentities($habitat['ha_id']);?>" class="btn btn-primary btn-sm m-3 <?php if (isset($_GET['ha'])) {if($activePage==$habitat['ha_id']) {?>active<?php ;}}?>"><?=htmlentities($habitat['ha_name']);?></a>
      <?php ;}?>
    </div>
    <div class="d-flex col-md-4 justify-content-center justify-content-md-end align-item-center">
      <a href="animal_add.php" class="btn btn-primary btn-sm my-3">Ajouter un animal</a>
    </div>
  </div>
  <div class="container my-3 ms-3 p-1">
    <?php if (isset($_GET['ha'])) {
      if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
      } else {
        $page = 1;
      }
      $ha_id=htmlentities($_GET['ha']);
      $offset=($page-1)*10;
      $animals=getAnimalsByHabitat($pdo, $ha_id, 10, $offset);
      $total = getNumberOfAnimalsPerHabitat($pdo, $ha_id);
      $totalPages = ceil($total/10);
      ?>
        <div class="container d-flex flex-wrap justify-content-around">
          <?php foreach ($animals as $animal) {
            if (isset($_POST["deleteAnimal".$animal['an_id']])) { ?>
              <!--empecher le renvoi du formulaire à l'actualisation de la page-->
              <script> location.replace(document.referrer); </script>
              <?php 
              $res = deleteAnimal($pdo, $animal['an_id']);
              if ($res) {
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
    <?php ;}?>
  </div>
</div>

<?php
require_once '../templates/_footer.php'
?>