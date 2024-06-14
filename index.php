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
<div d-inline>
  <div class="bandeau-habitats justify-content-center">

<?php 
$habitats = getHabitats($pdo);

foreach ($habitats as $habitat) {
        require __DIR__ . "/templates/_habitat_card.php";
    } ?>

  </div>
  
</div>
<!--Affichage de la section animaux-->
<div>
    <p>
        En venant à Arcadia, vous aurez le plaisir de rencontrer de nombreux animaux : girafes,  éléphants,  hippopotames,  singes,  serpents,  tortues et bien d'autres encore.
    </p>
</div>

<div class="container">
      <h1>Nos animaux</h1>
      <div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel">
        

        <!-- Carrousel -->
        <div class="carousel-inner mb-5">
          <div class="carousel-item active" data-interval="4000">
            <div class="row">
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'jungle_carre.webp';?>" alt="Carrousel slide 1" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'marais_carre.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'savane_carre.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
            </div>
          </div>
          <div class="carousel-item" data-interval="2000">
          <div class="row">
          <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'savane_carre.webp';?>" alt="Carrousel slide 1" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'marais_carre.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'savane_carre.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
            </div>
          </div>
          <div class="carousel-item" data-interval="1000">
          <div class="row">
          <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'marais_carre.webp';?>" alt="Carrousel slide 1" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'marais_carre.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'savane_carre.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
            </div>
          </div>
        </div>
        

        <a class="carousel-control-prev" href="#demo" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>

        </a>
        <a class="carousel-control-next" href="#demo" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>

        </a>
      </div>
    </div>
<!--Affichage de la section services-->
    <div>
    <p>
    Lors de votre venue, profitez également de nos <a href="services.php" class="link-text">services</a> : restauration, visite guidée des habitats, visite du zoo en petit train.
    </p>
</div>

<div class="bandeau-habitats justify-content-center">

<?php 
$services = getServices($pdo);

foreach ($services as $service) {
        require __DIR__ . "/templates/_service_card.php";
    } ?>

</div>
<!--Affichage de la section avis-->
<div class="border-top mt-3 pt-3">
    <div><h2>Ils sont venus nous voir</h2></div>
  <?php 
        require __DIR__ . "/templates/_review_add.php";

?>

  <?php 
$reviews = getApprovedReviews($pdo, _REVIEWS_LIMIT_);

foreach ($reviews as $review) {

        require __DIR__ . "/templates/_review_show.php";
    } ?>

<!--Affichage des avis supplémentaires-->

<p>
  <a class="btn btn-primary btn-sm js-button-voir-avis-supp" data-bs-toggle="collapse" href="#collapseShowAllReviews2" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-avis-supp">
    Voir +
  </a>
</p>

<?php 


$numberOfReviews=getNumberOfApprovedReviews($pdo);

for ($i = 2; $i<$numberOfReviews;$i++) 
  { ?>


<div class="collapse" id="collapseShowAllReviews<?= $i;?>">
<?php 
$offset = _REVIEWS_LIMIT_ * ($i-1);
$reviews = getApprovedReviews($pdo, _REVIEWS_LIMIT_, $offset);
foreach ($reviews as $review) {
        require __DIR__ . "/templates/_review_show.php";
    } 

    if ($i*3 >= $numberOfReviews) { 

      ?>
    <p>Il n'y a pas d'avis supplémentaire.</p>
      
    <?php } else {   ?>    
      
       <p>
  <a class="btn btn-primary btn-sm js-button-voir-avis-supp" data-bs-toggle="collapse" href="#collapseShowAllReviews<?= $i+1;?>" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-avis-supp">
    Voir +
  </a>
    </p>
       
    <?php } ?>
  </div>
  <?php ;} ?>

  


<?php require_once __DIR__ . "/templates/_footer.php"; ?>

<script src="script2.js"></script>