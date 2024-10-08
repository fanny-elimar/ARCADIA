<?php

require_once __DIR__ . "/lib/config.php"; 
require_once __DIR__ . "/lib/pdo.php"; 
require_once __DIR__ . "/templates/_header.php";
require_once __DIR__ . "/lib/service.php"; 
require_once __DIR__ . "/lib/horaire.php"; 
?>

<h1>Les services</h1>
<p>Pour rendre votre visite encore plus agréable, des services supplémentaires sont disponibles.</p>

<div class="container">
  <div class="d-md-flex justify-content-center">
    <?php $services = getServices($pdo);
    foreach ($services as $service) {
      require __DIR__ . "/templates/_service_card.php";
    } ?>
  </div>
</div>

<h1>Les horaires</h1>
<div class="row d-flex justify-content-center mx-1">
  <?php $horaires=getHoraires($pdo);
  if ($horaires) {
    foreach ($horaires as $horaire) { ?>
      <div class="col-sm-12 col-md-5 border rounded light m-1">
        <p>Du <?= date('d m Y',strtotime(htmlentities($horaire['ho_periode_start'])));?> au <?= date('d m Y',strtotime(htmlentities($horaire['ho_periode_end'])));?> : </p>
        <p> <?= ucfirst(htmlentities($horaire['ho_days']));?> de <?= date('H:i',strtotime(htmlentities($horaire['ho_time_start'])));?> à <?= date('H:i',strtotime(htmlentities($horaire['ho_time_end'])));?>.</p>
      </div>
    <?php ;} 
  } else {
    echo '<p>Un problème est survenu. Vous pouvez utiliser le formulaire de contact ou nous joindre au 02.XX.XX.XX.XX pour connaitre les horaires.</p>';
  }?>
</div>

<?php require_once __DIR__ . "/templates/_footer.php"; ?>