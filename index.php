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

<!--Carousel des animaux-->
<?php  $list = opendir(_ANIMALS_IMAGES_FOLDER_);
  
  $tabfile = array();
  
  while ($fichier = readdir($list)) 
  {
  ($fichier != "." && $fichier != ".." && $fichier != ".htaccess")? $tabfile[] = $fichier : '' ;
  }
  closedir($list);

//mélange du tableau
  shuffle($tabfile);
  $carouselImage1=array_shift($tabfile);
  $carouselImage2=array_shift($tabfile);
  $carouselImage3=array_shift($tabfile);
  $carouselImage4=array_shift($tabfile);
  $carouselImage5=array_shift($tabfile);
  $carouselImage6=array_shift($tabfile);
  $carouselImage7=array_shift($tabfile);
  $carouselImage8=array_shift($tabfile);
  $carouselImage9=array_shift($tabfile);

?>



<div class="container">
      <h1>Nos animaux</h1>
      <!-- Carrousel pour écrans larges-->
      <div id="carousel-animal-lg" class="carousel slide carousel-fade d-none d-lg-flex" data-bs-ride="carousel">
                
        <div class="carousel-inner">
          <div class="carousel-item active" data-interval="4000">
            <div class="row d-flex justify-content-around align-item-center">

                <div class="col-11 col-md-6 col-lg-4"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage1;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>

                <div class="d-none d-md-flex col-md-6 col-lg-4"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage2;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100"></div>
                
                <div class="col-lg-4 d-lg-flex d-none"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage3;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div>
          </div>
          <div class="carousel-item" data-interval="2000">
          <div class="row d-flex justify-content-around">
          <div class="col-11 col-md-6 col-lg-4"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage4;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100"></div>

                <div class="col-md-6 col-lg-4 d-none d-md-flex"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage5;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100"></div>
                
                <div class="col-lg-4 d-none d-lg-flex"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage6;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div>
          </div>
          <div class="carousel-item" data-interval="2000">
          <div class="row d-flex justify-content-around">
          <div class="col-11 col-md-6 col-lg-4 "><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage7;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>

<div class="col-md-6 col-lg-4 d-none d-md-flex"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage8;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>

<div class="col-lg-4 d-none d-lg-flex"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage9;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100"></div>
            </div>
          </div>
           </div>
                <a class="carousel-control-prev" href="#carousel-animal-lg" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carousel-animal-lg" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>


    <!-- Carrousel pour écrans medium-->
    <div id="carousel-animal-md" class="carousel slide carousel-fade d-none d-md-flex d-lg-none" data-bs-ride="carousel">
        
        <div class="carousel-inner">
          <div class="carousel-item active" data-interval="4000">
            <div class="row d-flex justify-content-around align-item-center">

                <div class="col-6"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage1;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>

                <div class="col-6"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage2;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100"></div>
            </div>
          </div>
            <div class="carousel-item" data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-6"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage3;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
                <div class="col-6"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage4;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100"></div>
                </div>
                </div>
                 <div class="carousel-item" data-interval="2000">
                 <div class="row d-flex justify-content-around align-item-center">
                <div class="col-6"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage5;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
                <div class="col-6"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage6;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100"></div>
                </div>
          </div>
          <div class="carousel-item" data-interval="2000">
                 <div class="row d-flex justify-content-around align-item-center">
                <div class="col-6"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage7;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
                <div class="col-6"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage8;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100"></div>
                </div>
          </div>
           </div>
                <a class="carousel-control-prev" href="#carousel-animal-md" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carousel-animal-md" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>

      <!-- Carrousel pour écrans small-->
      <div id="carousel-animal-sm" class="carousel slide carousel-fade d-md-none" data-bs-ride="carousel">
              
        <div class="carousel-inner">
          <div class="carousel-item active" data-interval="4000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage1;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            <div class="carousel-item " data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage2;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            <div class="carousel-item " data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage3;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            <div class="carousel-item " data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage4;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            <div class="carousel-item " data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage5;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            <div class="carousel-item " data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage6;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            <div class="carousel-item " data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage7;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            <div class="carousel-item " data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage8;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            <div class="carousel-item " data-interval="2000">
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $carouselImage9;?>" alt="Carrousel slide 1" class="d-block img-fluid w-100 h-100" ></div>
            </div></div>
            

           </div>
                <a class="carousel-control-prev" href="#carousel-animal-sm" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carousel-animal-sm" role="button" data-bs-slide="next">
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
  
  if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['us_role']==='employe') {
        require_once __DIR__ ."/templates/_review_approve.php";}}

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

<script src="script4.js"></script>