<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/animal.php';
require_once '../lib/habitat.php';
require_once '../lib/tools.php';



$messages = [];
$errors = [];
$animal = [
  'an_name' => '',
  'an_species' => '',
  'an_images' => '',
  'an_ha_id' => '',
  'an_en_id' =>''
];



$habitats = getHabitats($pdo);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $animal = getAnimalById($pdo, $id);
  $extraImages = getImagesByAnimalId($pdo, $animal['an_id']);

  if (!$animal) {
    $errors[] = 'Cet animal n\'existe pas';
  }
    $pageTitle = 'Formulaire de modification d\'un animal';
} else {
  $pageTitle = 'Formulaire d\'ajout d\'un animal';
}


if (isset($_POST['addAnimal'])) { 

  $fileName = null;
  // Si un fichier est envoyé
  if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
      $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
      if ($checkImage !== false) {
          $fileName = slugify(basename($_FILES["file"]["name"]));
          $fileName = uniqid() . '-' . $fileName;



          /* On déplace le fichier uploadé dans notre dossier upload, dirname(__DIR__) 
              permet de cibler le dossier parent car on se trouve dans admin
          */
          if (move_uploaded_file($_FILES["file"]["tmp_name"], _ANIMALS_IMAGES_FOLDER_ .$fileName)) {
              if (isset($_POST['an_images'])) {
                  // On supprime l'ancienne image si on a posté une nouvelle
                  unlink(_ANIMALS_IMAGES_FOLDER_ . $_POST['an_images']);
              }
          } else {
              $errors[] = 'Le fichier n\'a pas été uploadé';
          }
      } else {
          $errors[] = 'Le fichier doit être une image';
      }
  } else {
      // Si aucun fichier n'a été envoyé
      if (isset($_GET['id'])) {
          if (isset($_POST['delete_image'])) {
              // Si on a coché la case de suppression d'image, on supprime l'image
              unlink(_ANIMALS_IMAGES_FOLDER_.$_POST['an_images']);
          } else {
              $fileName = $_POST['an_images'];
          }
      }
  }
  /* On stocke toutes les données envoyés dans un tableau pour pouvoir afficher
     les informations dans les champs. C'est utile pas exemple si on upload un mauvais
     fichier et qu'on ne souhaite pas perdre les données qu'on avait saisit.
  */


  $animal = [
  'an_name' => $_POST['an_name'],
  'an_species' => $_POST['an_species'],
  'an_images' => $fileName,
  'an_ha_id' => $_POST['an_ha_id'],
  'an_en_id' => $_POST['an_en_id']
  ];
    // Si il n'y a pas d'erreur on peut faire la sauvegarde

  if (!$errors) {
    if (isset($_GET["id"])) {
      $id = (int)$_GET["id"];
    } else {
      $id = null;
    }

    $res = addAnimal($pdo, $_POST['an_name'], $_POST['an_species'], $fileName,  $_POST['an_ha_id'],  $_POST['an_en_id'], $id);
    if ($res) {
      $messages[] = 'L\'animal a bien été sauvegardé';
      if (!isset($_GET["id"])) {
        $animal = [
        'an_name' => '',
        'an_species' => '',
        'an_images' => '',
        'an_ha_id' => '',
        'an_en_id' => ''
        ];
      }
    } else {
      $errors[] = 'Une erreur s\'est produite.';
    }

  }
} 

if (isset($_POST['addImage'])) { ?>
  <!--empecher le renvoi du formulaire à l'actualisation de la page-->
              <script> location.replace(document.referrer); </script>
              <?php

  $extraFileName = null;
  // Si un fichier est envoyé
  if (isset($_FILES["extraFile"]["tmp_name"]) && $_FILES["extraFile"]["tmp_name"] != '') {
      $checkImage = getimagesize($_FILES["extraFile"]["tmp_name"]);
      if ($checkImage !== false) {
          $extraFileName = slugify(basename($_FILES["extraFile"]["name"]));
          $extraFileName = uniqid() . '-' . $extraFileName;



          /* On déplace le fichier uploadé dans notre dossier upload, dirname(__DIR__) 
              permet de cibler le dossier parent car on se trouve dans admin
          */
          if (move_uploaded_file($_FILES["extraFile"]["tmp_name"], _ANIMALS_IMAGES_FOLDER_ .$extraFileName)) {
              echo 'Bravo';
          } else {
              $errors[] = 'Le fichier n\'a pas été uploadé';
          }
      } else {
          $errors[] = 'Le fichier doit être une image';
      }
  } 
  /* On stocke toutes les données envoyés dans un tableau pour pouvoir afficher
     les informations dans les champs. C'est utile pas exemple si on upload un mauvais
     fichier et qu'on ne souhaite pas perdre les données qu'on avait saisit.
  */


  
    // Si il n'y a pas d'erreur on peut faire la sauvegarde

  if (!$errors) {
    if (isset($_GET["id"])) {
      $id = (int)$_GET["id"];
    } else {
      $id = null;
    }

    $res2 = addImage ($pdo, $extraFileName, $id);

    
  }}

?>

<h3><?= $pageTitle ?></h3>
<?php foreach ($messages as $message) { ?>
  <div class="alert alert-success" role="alert">
    <?= $message; ?>
  </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
  <div class="alert alert-danger" role="alert">
    <?= $error; ?>
  </div>
<?php } 
if ($animal) { ?>
  <div class="" >
    <form method="POST" enctype="multipart/form-data" class="" >
 
            <div class="mb-3 form-group row">
                    <label for="an_name" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="an_name" name="an_name" value="<?= $animal['an_name'];?>">
                    </div>
                </div>    
            <div class="mb-3 form-group row">
                    <label for="an_species" class="col-sm-2 col-form-label">Espèce</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="an_species" name="an_species" value="<?= $animal['an_species'];?>">
                    </div>
                </div>
                <div class="mb-3 form-group row">
                    <label for="an_en_id" class="col-sm-3 col-form-label">Enclos</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="an_en_id" name="an_en_id" value="<?= $animal['an_en_id'];?>">
                    </div>
                </div>
                <div class="mb-3 form-group col-3">
                <label for="an_ha_id" class="col-sm-3 col-form-label">Habitat</label>
                    <select type="text" class="form-control col-3 text-primary" id="an_ha_id" name="an_ha_id">
                    <?php foreach ($habitats as $habitat) {?>
                                <option value="<?=$habitat['ha_id'];?>" <?php if ($habitat['ha_id'] == $animal['an_ha_id']) {echo 'selected="selected"';} ?>><?= $habitat['ha_name'] ?>
                                </option> 
                            <?php }; ?>
                    </select>
                </div>
     

   
      
      <?php if (isset($_GET['id']) && isset($animal['an_images'])) {?>
            <p>
                <img src="<?= _ANIMALS_IMAGES_FOLDER_ . $animal['an_images'] ;?>" alt="image<?= $animal['an_name'] ?>" width="100">
                <label for="delete_image" class="text-sm">Supprimer l'image</label>
                <input type="checkbox" name="delete_image" id="delete_image">
                <input type="hidden" name="an_images" value="<?= $animal['an_images']; ?>">
                

            </p>
        <?php } ?>
        <p class="text-truncate">
            <input type="file" name="file" id="file" class="form-control btn-sm btn col-sm-12">
        </p>

        <div class="form-group row d-flex justify-content-center">
  <input type="submit" name="addAnimal" class="btn btn-primary btn-sm col-4" value="Valider"></div>
    </form>
      
        <?php if ($extraImages) {
          foreach ($extraImages as $extraImage) {
            if (isset($_POST["deleteImage".$extraImage['im_an_id']])) { ?>
              <!--empecher le renvoi du formulaire à l'actualisation de la page-->
              <script> location.replace(document.referrer); </script>
              <?php 
              $res5 = deleteImage($pdo, $extraImage['im_an_id']);
              if ($res5) {
                  $messages[] = 'Merci pour votre avis.';
              } else {
                  $errors[] = 'Une erreur s\'est produite.';
              }
          } ?> 
            
            
            <img src="<?= _ANIMALS_IMAGES_FOLDER_ . $extraImage['im_an_filename'] ;?>" alt="image<?= $animal['an_name'] ?>" width="100">
            <form method='POST'>
            <button type="submit" name= "<?php echo 'deleteImage'.$extraImage['im_an_id'];?>" class="btn btn-primary btn-sm" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image <?= $extraImage['im_an_filename']?>?')"><img src="../assets/icones/delete.png" height="15"></button>
            </form></div>
          <?php }
        } ?>

  <a class="btn btn-primary btn-sm js-button-ajouter-images" data-bs-toggle="collapse" href="#collapseAddImages" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-ajouter-image">
    Ajouter des photos
  </a>
  <div class="collapse" id="collapseAddImages">
    <form method="POST" enctype="multipart/form-data">
        <p class="text-truncate">
            <input type="file" name="extraFile" id="extraFile" class="form-control btn-sm btn col-sm-12">
        </p>
      <input type="submit" name="addImage" class="btn btn-primary btn-sm col-4" value="Ajouter"></div>
    </form>
    


  </div>
  
    <p>

</p>
  </div>



<?php }
require_once "templates/_footer.php";