<div class="m-3 card">
<img class="card-img-top" src="<?=_SERVICES_IMAGES_FOLDER_.$service["se_images"];?>" alt="Image <?= htmlentities($service["se_name"])?>">
   

  <div class="card-body justify-content-center">
    <h6 class="card-title"><?= ucfirst(htmlentities($service["se_name"]))?></h6>
    <p class="card-text"><?= substr(htmlentities($service["se_description"]),0,200).'...'?></p>
    <a href="service_page.php?id=<?=htmlentities($service['se_id']);?>" class="btn btn-primary">Voir</a>
  </div>
</div>

