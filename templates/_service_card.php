<div class="m-3" >
<img class="" src="<?=_ASSETS_IMAGES_FOLDER_ADM.$service["se_images"];?>" alt="Image <?= $service["se_name"]?>">
   

  <div class="">
    <h6 class=""><?= ucfirst(htmlentities($service["se_name"]))?></h5>
    <p class=""><?= (htmlentities($service["se_description"])).'...'?></p>
    <a href="#" class="btn btn-primary">Voir</a>
  </div>
</div>