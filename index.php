<?php

require_once __DIR__ . "/templates/_header.php";
?>

<div>
    <p>Situé en Bretagne, près de la forêt de Brocéliande, Arcadia est un lieu de découverte de la biodiversité mondiale. Au fil de votre visite, vous découvrirez des <a href="habitats.php" class="link-text">habitats</a> variés et la faune   qui y vit.</p>
</div>

<div class="bandeau-habitats justify-content-center">

<?php
require __DIR__ . "/templates/_habitat_card.php";
require __DIR__ . "/templates/_habitat_card.php";
require __DIR__ . "/templates/_habitat_card.php";
?>

</div>
<div>
    <p>
        En venant à Arcadia, vous aurez le plaisir de rencontrer de nombreux animaux : girafes,  éléphants,  hippopotames,  singes,  serpents,  tortues et bien d'autres encore.
    </p>
</div>

<div class="container">
      <h1>Carrousel</h1>
      <div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel">
        

        <!-- Carrousel -->
        <div class="carousel-inner">
          <div class="carousel-item active" data-interval="4000">
            <div class="row">
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'jungle.webp';?>" alt="Carrousel slide 1" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'marais.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
            </div>
          </div>
          <div class="carousel-item" data-interval="2000">
          <div class="row">
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'savane.webp';?>" alt="Carrousel slide 1" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'jungle.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
            </div>
          </div>
          <div class="carousel-item" data-interval="1000">
          <div class="row">
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'marais.webp';?>" alt="Carrousel slide 1" class="d-block"></div>
                <div class="col"><img src="<?=_ASSETS_IMAGES_FOLDER_.'savane.webp';?>" alt="Carrousel slide 2" class="d-block"></div>
            </div>
          </div>
        </div>
        
        <!-- Contrôles -->
        <a class="carousel-control-prev" href="#demo" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>

        </a>
        <a class="carousel-control-next" href="#demo" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>

        </a>
      </div>
    </div>


<?php require_once __DIR__ . "/templates/_footer.php"; ?>