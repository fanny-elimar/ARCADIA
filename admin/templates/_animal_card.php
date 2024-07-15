<?php
$enclosure = getEnclosureByAnimalId($pdo, $animal['an_id']);
$images = getImagesByAnimalId($pdo, $animal['an_id']);
?>

<div class="card m-1 light" style="width:15rem; height:10rem;" >
  
  <div class="card-body justify-content-center row">
    <div class="col" >
    <h6 class="card-title"><?= ucfirst(htmlentities($animal["an_name"]))?></h6>
    <p class="card-text"><?= ucfirst(htmlentities($animal["an_species"]))?></p>
    <p class="card-text">Enclos <?= ucfirst(htmlentities($animal["an_en_name"]))?></p>
</div>
<div class="col">
  <img src="<?= _ANIMALS_IMAGES_FOLDER_ADMIN_ . $animal['an_images'] ;?>" alt="image<?= htmlentities($animal['an_name']) ?>" width="100">
</div>
    <div class="row">  



    
    <div class="col-4 p-0">
                <a class="btn btn-primary btn-sm p-1 mx-1" href="<?="animal_add.php?id=".$animal['an_id']?>">Modifier</a>
            </div>
            <div class="col-3">
              <form method='POST'>
            <button type="submit" name="<?php echo 'deleteAnimal'.$animal['an_id'];?>" class="btn btn-primary btn-sm" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')"><img src="../assets/icones/delete.png" height="15"></button>
            </form></div>
            <div class="col-4 p-0">
                <a class="btn btn-primary btn-sm py-1 px-1" href="<?="animal_info.php?id=".$animal['an_id']?>">+ d'info</a>
            </div>
  </div></div>
</div>