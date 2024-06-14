<div class="card m-3" style="width: 18rem;">
<img class="card-img-top" src="<?=_ASSETS_IMAGES_FOLDER_.$animal["an_images"];?>" alt="Image <?= $animal["an_name"]?>">
   

  <div class="card-body justify-content-center">
    <h6 class="card-title"><?= ucfirst(htmlentities($animal["an_name"]))?></h5>
    <p class="card-text"><?= ucfirst(htmlentities($animal["an_species"]))?></p>
    <a href="#" class="btn btn-primary">Voir</a>
  </div>
</div>

