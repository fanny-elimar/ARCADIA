<?php
require_once __DIR__ . "/lib/config.php"; 
require_once __DIR__ . "/lib/pdo.php"; 
require_once __DIR__ . "/templates/_header.php";
require_once __DIR__ . "/lib/habitat.php"; 
require_once __DIR__ . "/lib/service.php";
require_once __DIR__ . "/lib/review.php";
?>

<div>
    <p>Situé en Bretagne, près de la forêt de Brocéliande, Arcadia est un lieu de découverte de la biodiversité mondiale. Au fil de votre visite, vous découvrirez des <a href="habitats.php" class="link-text">habitats</a> variés et la faune   qui y vit.</p>
</div>
<!--Affichage de la section habitats-->
<div class="container">
  <div class="d-md-flex justify-content-center">
    <?php $habitats = getHabitats($pdo);
    foreach ($habitats as $habitat) {
      require __DIR__ . "/templates/_habitat_card.php";
    } ?>
  </div>
</div>

<!--Affichage de la section animaux-->
<div>
  <p>En venant à Arcadia, vous aurez le plaisir de rencontrer de nombreux animaux : girafes,  éléphants,  hippopotames,  singes,  serpents,  tortues et bien d'autres encore.</p>
</div>

<h1>Nos animaux</h1>
<div class="container">
  <?php require __DIR__ . "/templates/_carousel_animaux.php";?>
</div>

<!--Affichage de la section services-->

<h1>Nos services</h1>
<p>Lors de votre venue, profitez également de nos <a href="services.php" class="link-text">services</a> : restauration, visite guidée des habitats, visite du zoo en petit train.</p>
<div class="container">
  <div class="d-md-flex justify-content-center">
    <?php $services = getServices($pdo);
    foreach ($services as $service) {
      require __DIR__ . "/templates/_service_card.php";
    } ?>
  </div>
</div>

<!--Affichage de la section avis-->
<div class="container border-top mt-3 pt-3">
  <h2>Ils sont venus nous voir</h2>
  <?php require __DIR__ . "/templates/_review_add.php";
  if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['us_role']==='employe') {
      require_once __DIR__ ."/templates/_review_approve.php";
    }
  }
  $reviews = getApprovedReviews($pdo, _REVIEWS_LIMIT_);
  foreach ($reviews as $review) {
    require __DIR__ . "/templates/_review_show.php";
  } ?>

  <!--Affichage des avis supplémentaires-->
  <div>
    <a class="btn btn-primary btn-sm js-button-voir-avis-supp" data-bs-toggle="collapse" href="#collapseShowAllReviews2" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-avis-supp">
    Voir +</a>
  </div>
  <?php $numberOfReviews=getNumberOfApprovedReviews($pdo);
  for ($i = 2; $i<$numberOfReviews;$i++) { ?>
    <div class="collapse" id="collapseShowAllReviews<?= $i;?>">
      <?php $offset = _REVIEWS_LIMIT_ * ($i-1);
      $reviews = getApprovedReviews($pdo, _REVIEWS_LIMIT_, $offset);
      foreach ($reviews as $review) {
        require __DIR__ . "/templates/_review_show.php";
      }
      if ($i*3 >= $numberOfReviews) { ?>
        <p>Il n'y a pas d'avis supplémentaire.</p>
      <?php } else { ?>    
        <div>
          <a class="btn btn-primary btn-sm js-button-voir-avis-supp" data-bs-toggle="collapse" href="#collapseShowAllReviews<?= $i+1;?>" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-avis-supp">Voir +</a>
        </div>
      <?php } ?>
    </div>
  <?php ;} ?>
</div>
<?php require_once __DIR__ . "/templates/_footer.php"; ?>

<script src="script.js"></script>