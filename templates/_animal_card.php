<div class="card m-3">
  <?php 
  $image=$animal["an_images"];
  ?>
<img class="card-img-top animal-card-image" src="<?=_ANIMALS_IMAGES_FOLDER_.$image;?>" alt="Image <?= $animal["an_name"]?>">
   

  <div class="card-body justify-content-center">
    <h6 class="card-title"><?= ucfirst(htmlentities($animal["an_name"]))?></h5>
    <p class="card-text"><?= ucfirst(htmlentities($animal["an_species"]))?></p>
  
    <a href="animal_page.php?id=<?=$id;?>&page=<?=$animalRank;?>" class="btn btn-primary">Voir</a>
  </div>
</div>

