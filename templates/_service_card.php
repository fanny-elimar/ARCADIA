<div class="card m-3" style="width: 18rem;">
<img class="card-img-top" src="<?=_ASSETS_IMAGES_FOLDER_.$service["se_images"];?>" alt="Image <?= $service["se_name"]?>">
   

  <div class="card-body justify-content-center">
    <h6 class="card-title"><?= ucfirst(htmlentities($service["se_name"]))?></h5>
    <p class="card-text"><?= substr(htmlentities($service["se_description"]),0,210).'...'?></p>
    <a href="service_page.php?id=<?=$service['se_id'];?>" class="btn btn-primary">Voir</a>
  </div>
</div>