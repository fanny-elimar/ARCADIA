<div class="card m-3">
  <img class="card-img-top " src="<?=_HABITATS_IMAGES_FOLDER_.$habitat["ha_images"];?>" alt="Image <?= htmlentities($habitat["ha_name"])?>">
  <div class="card-body justify-content-center">
    <h6 class="card-title"><?= ucfirst(htmlentities($habitat["ha_name"]))?></h5>
    <p class="card-text"><?= substr(htmlentities($habitat["ha_description"]),0,200).'...'?></p>
    <a href="habitat_page.php?id=<?=htmlentities($habitat['ha_id']);?>" class="btn btn-primary">Voir</a>
  </div>
</div>

