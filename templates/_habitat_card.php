<div class="card m-3" style="width: 18rem;">
<img class="card-img-top" src="<?=_ASSETS_IMAGES_FOLDER_.$habitat["ha_images"];?>" alt="Image <?= $habitat["ha_name"]?>">
   

  <div class="card-body justify-content-center">
    <h6 class="card-title"><?= ucfirst(htmlentities($habitat["ha_name"]))?></h5>
    <p class="card-text"><?= substr(htmlentities($habitat["ha_description"]),0,200).'...'?></p>
    <a href="#" class="btn btn-primary">Voir</a>
  </div>
</div>

