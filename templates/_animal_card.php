<?php 
$image=$animal["an_images"];

$numberOfClics = getClicsByNames($client, $animal["an_name"]);
if ($numberOfClics) {
  $numberOfClic = $numberOfClics[0]["clic"];
} else {
  $numberOfClic=0;
}

?> 



<div class="card m-3">
  <img class="card-img-top animal-card-image" src="<?=_ANIMALS_IMAGES_FOLDER_.$image;?>" alt="Image <?=htmlentities($animal["an_name"])?>">
  <div class="card-body justify-content-center">
    <h6 class="card-title"><?= ucfirst(htmlentities($animal["an_name"]))?></h5>
    <p class="card-text"><?= ucfirst(htmlentities($animal["an_species"]))?></p>
    <form method='POST' id="myForm">
      <button type="submit" name="<?php echo 'updateClic'.$animal['an_name'];?>" class="btn btn-primary btn-sm">Voir</button>
    </form>
  </div>
</div>

