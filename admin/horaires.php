<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/horaire.php';

$messages =[];
$errors =[];
$horaires = getHoraires($pdo);

if (isset($_POST['addHoraire'])) { 

  $horaire = [
  'ho_periode_start' => $_POST['ho_periode_start'],
  'ho_periode_end' => $_POST['ho_periode_end'],
  'ho_days' => $_POST['ho_days'],
  'ho_time_start' => $_POST['ho_time_start'],
  'ho_time_end' => $_POST['ho_time_end']
  ];
  
  if (!$errors) {?>
  <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace(document.referrer); </script>
    <?php $res = addHoraire($pdo, $_POST['ho_periode_start'], $_POST['ho_periode_end'], $_POST['ho_days'], $_POST['ho_time_start'], $_POST['ho_time_end']);
    if ($res) {
      $messages[] = 'L\'horaire a bien été sauvegardé';
      $horaire = [
        'ho_periode_start' => '',
        'ho_periode_end' => '',
        'ho_days' => '',
        'ho_time_start' => '',
        'ho_time_end' => ''
        ];
    } else {
      $errors[] = 'Une erreur s\'est produite.';
    }
  }
} ?>

<h1>Horaires d'ouverture</h1>
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

<div class="container my-3  p-1">
  <?php if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['us_role']==='admin') {
      foreach ($horaires as $horaire) {
        if (isset($_POST['updateHoraire'.$horaire['ho_id']])) { 
          if (!$errors) {?>
            <!--empecher le renvoi du formulaire à l'actualisation de la page-->
            <script> location.replace(document.referrer); </script>
            <?php $res = updateHoraire($pdo, $_POST['ho_periode_start'], $_POST['ho_periode_end'], $_POST['ho_days'], $_POST['ho_time_start'], $_POST['ho_time_end'], $horaire['ho_id']);
              if ($res) {
                $messages[] = 'L\'horaire a bien été modifié';                  
              } else {
                $errors[] = 'Une erreur s\'est produite.';
              }
          } 
        }
        if (isset($_POST['deleteHoraire'.$horaire['ho_id']])) { 
          if (!$errors) {?>
            <!--empecher le renvoi du formulaire à l'actualisation de la page-->
            <script> location.replace(document.referrer); </script>
            <?php $res = deleteHoraire($pdo, $horaire['ho_id']);
            if ($res) {
              $messages[] = 'L\'horaire a bien été supprimé';                  
            } else {
              $errors[] = 'Une erreur s\'est produite.';
            }
          } 
        }?>
        <form method="POST">
        <div class="mb-3 p-3 border">
          <div class="form-group row mb-3">
            <p class="col-sm-12 col-md-1 mb-1"> Du </p>    
            <input type="date" class="form-control col mb-3" name="ho_periode_start" value="<?=htmlentities( $horaire['ho_periode_start']);?>">
            <p class="col-sm-12 col-md-1 mb-1"> au </p>    
            <input type="date" class="form-control col mb-3" name="ho_periode_end" value="<?= htmlentities($horaire['ho_periode_end']);?>">
          </div>
          <div class="form-group row  mb-3">   
            <input type="text" class="form-control col mb-3" name="ho_days" value="<?= htmlentities($horaire['ho_days']);?>">
          </div>
          <div class="form-group row  mb-3">
            <p class="col-sm-12 col-md-1 mb-1"> De </p>    
            <input type="time" class="form-control col mb-3"  name="ho_time_start" value="<?= htmlentities($horaire['ho_time_start']);?>">
            <p class="col-sm-12 col-md-1 mb-1"> à </p>    
            <input type="time" class="form-control col mb-3"  name="ho_time_end" value="<?= htmlentities($horaire['ho_time_end']);?>">
          </div>
            <input type="submit" class="btn btn-sm btn-primary" name="updateHoraire<?=$horaire['ho_id'];?>" value="Modifier">
            <input type="submit" class="btn btn-sm btn-primary" name="deleteHoraire<?=$horaire['ho_id'];?>" value="Supprimer">
          </div>
        </form>
      <?php ;} ?>
      <div>
        <a class="btn btn-primary btn-sm js-button-ajouter-horaire col-4" data-bs-toggle="collapse" href="#collapseAddHoraire" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-addHoraire">Ajouter</a>
        <div class="collapse mt-3" id="collapseAddHoraire">
          <form name="addHoraire" method="POST">          
            <div class="mb-5 p-3 border">
              <div class="form-group row mb-3">
                <p class="col-sm-12 col-md-1 mb-1"> Du </p>    
                <input type="date" class="form-control col mb-3" id="periode_start" name="ho_periode_start">
                <p class="col-sm-12 col-md-1 mb-1"> au </p>    
                <input type="date" class="form-control col mb-3" id="periode_end" name="ho_periode_end">
              </div>
              <div class="form-group row  mb-3">   
                <input type="text" class="form-control col mb-3" id="days" name="ho_days" placeholder="Indiquer les jours concernés...">
              </div>
              <div class="form-group row  mb-3">
                <p class="col-sm-12 col-md-1 mb-1"> De </p>    
                <input type="time" class="form-control col mb-3" id="time_start" name="ho_time_start" >
                <p class="col-sm-12 col-md-1 mb-1"> à </p>    
                <input type="time" class="form-control col mb-3" id="time_end" name="ho_time_end">
              </div>
              <input type="submit" class="btn btn-sm btn-primary" name="addHoraire" value="Ajouter">
            </div>
          </form> 
        </div>
      </div>
    <?php }
  } ?>

  <?php if (!isset($_SESSION['user']) || ($_SESSION['user']['us_role']==='employe')) {
    for ($x = 1; $x <= 5; $x++) {?>
      <p>Du <?= date('d-m-Y',strtotime($_POST['periode'.$x.'_start']));?> au <?= date('d-m-Y',strtotime($_POST['periode'.$x.'_end']));?></p>
      <p>Les <?= $_POST['periode'.$x.'_days'];?> de <?= $_POST['time'.$x.'_start'];?> à <?= $_POST['time'.$x.'_end'];?>.</p>
    <?php }
  } ?>
</div>

</div>
<?php
require_once '../templates/_footer.php'
?>