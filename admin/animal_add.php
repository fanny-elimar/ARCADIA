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
  'an_en_name' =>''
];

$habitats = getHabitats($pdo);


if (isset($_GET['id'])) {
  $id = htmlentities($_GET['id']);
  $animal = getAnimalById($pdo, $id);
  if ($animal) {$extraImages = getImagesByAnimalId($pdo, $animal['an_id']);}
  $enclosure=getEnclosureByAnimalId($pdo, $id);

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
    list($width, $height) = $checkImage;
    if ($width < $height) {
      $errors[] = 'Veuillez choisir une image en mode paysage';
    } else {
      if ($checkImage !== false) {
      $fileName = slugify(basename($_FILES["file"]["name"]));
      $fileName = uniqid() . '-' . $fileName;
      /* On déplace le fichier uploadé dans notre dossier upload */
      if (move_uploaded_file($_FILES["file"]["tmp_name"], _ANIMALS_IMAGES_FOLDER_ADMIN_ .$fileName)) {
        if (isset($_POST['an_images'])) {
        // On supprime l'ancienne image si on a posté une nouvelle
        unlink(_ANIMALS_IMAGES_FOLDER_ADMIN_ . $_POST['an_images']);
        }
      } else {
        $errors[] = 'Le fichier n\'a pas été téléchargé';
      }
    } else {
      $errors[] = 'Le fichier doit être une image';
    }
    }
    
  } else {
    // Si aucun fichier n'a été envoyé
    if (isset($_GET['id'])) {
      if (isset($_POST['delete_image'])) {
        // Si on a coché la case de suppression d'image, on supprime l'image
        unlink(_ANIMALS_IMAGES_FOLDER_ADMIN_.$_POST['an_images']);
      } else {
        $fileName = $_POST['an_images'];
      }
    }
    // Si aucun fichier n'a été envoyé
    if (isset($_GET['id'])) {
      if (isset($_POST['delete_image'])) {
        // Si on a coché la case de suppression d'image, on supprime l'image
        unlink(_ANIMALS_IMAGES_FOLDER_ADMIN_.$_POST['an_images']);
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
  'an_en_name' => $_POST['an_en_name']
  ];
  // Si il n'y a pas d'erreur on peut faire la sauvegarde
  if (!$errors) {
    if (isset($_GET["id"])) {
      $id = (int)htmlentities($_GET["id"]);
    } else {
      $id = null;
    }
  // on vérifie que l'enclos existe, sinon on le crée.
  $res1=verifyEnclosureExists($pdo, $_POST ['an_en_name']);
  if (!$res1) {
    $res2=addEnclosure($pdo, $_POST ['an_en_name']);
  } 
  $res = addAnimal($pdo, $_POST['an_name'], $_POST['an_species'], $fileName,  $_POST['an_ha_id'],  $_POST['an_en_name'], $id);
    if ($res) {
      $messages[] = 'L\'animal a bien été sauvegardé';
      if (!isset($_GET["id"])) {
        $animal = [
        'an_name' => '',
        'an_species' => '',
        'an_images' => '',
        'an_ha_id' => '',
        'an_en_name' => ''
        ];
      }
    } else {
      $errors[] = 'Une erreur s\'est produite.';
    }
  }
} 
?>

<h3><?= $pageTitle ?></h3>

<?php foreach ($messages as $message) { ?>
  <div class="alert alert-success" role="alert"><?= $message; ?>
  </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
  <div class="alert alert-danger" role="alert"><?= $error; ?>
  </div>
<?php } 

if ($animal) { ?>
  <div class="" >
    <form method="POST" enctype="multipart/form-data" class="" >
      <div class="mb-3 form-group row">
        <label for="an_name" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="an_name" name="an_name" value="<?= htmlentities($animal['an_name']);?>">
        </div>
      </div>    
      <div class="mb-3 form-group row">
        <label for="an_species" class="col-sm-2 col-form-label">Espèce</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="an_species" name="an_species" value="<?= htmlentities($animal['an_species']);?>">
          </div>
      </div>
      <div class="mb-3 form-group row">
        <label for="an_en_name" class="col-sm-3 col-form-label">Enclos</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="an_en_name" name="an_en_name" value="<?= htmlentities($animal['an_en_name']);?>">
        </div>
      </div>
      <div class="mb-3 form-group col-3">
        <label for="an_ha_id" class="col-sm-3 col-form-label">Habitat</label>
        <select type="text" class="form-control col-3 primary" id="an_ha_id" name="an_ha_id">
          <?php foreach ($habitats as $habitat) {?>
            <option value="<?=htmlentities($habitat['ha_id']);?>" <?php if ($habitat['ha_id'] == $animal['an_ha_id']) {echo 'selected="selected"';} ?> class="primary"><?= htmlentities($habitat['ha_name']) ?>
            </option> 
          <?php }; ?>
        </select>
      </div>
      <div>
        <?php if (isset($_GET['id']) && isset($animal['an_images'])) {?>
          <img src="<?= _ANIMALS_IMAGES_FOLDER_ADMIN_ . $animal['an_images'] ;?>" alt="image<?=htmlentities($animal['an_name']) ?>" width="100">
          <label for="delete_image" class="text-sm">Supprimer l'image</label>
          <input type="checkbox" name="delete_image" id="delete_image">
          <input type="hidden" name="an_images" value="<?= htmlentities($animal['an_images']); ?>">
        <?php } ?>
        <p class="text-truncate">
          <input type="file" name="file" id="file" class="form-control btn-sm btn col-sm-12">
        </p>
      </div>
      <div class="form-group row d-flex justify-content-center">
        <input type="submit" name="addAnimal" class="btn btn-primary btn-sm col-4 mb-3" value="Valider">
      </div>
    </form>
  </div>
  <?php if (isset($_GET['id'])) {
    require 'templates/_extra_image_add.php';}?>
  <?php }?>
</div>
<?php require_once "templates/_footer.php";