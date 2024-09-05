<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/habitat.php';
require_once '../lib/tools.php';

$messages = [];
$errors = [];
$habitat = [
  'ha_name' => '',
  'ha_description' => '',
  'ha_images' => ''
];

if (isset($_GET['id'])) {
  $id = htmlentities($_GET['id']);
  $habitat = getHabitatById($pdo, $id);
  if (!$habitat) {
    $errors[] = 'Cet habitat n\'existe pas';
  }
    $pageTitle = 'Formulaire de modification des habitats';
} else {
  $pageTitle = 'Formulaire d\'ajout d\'un habitat';
}


if (isset($_POST['addHabitat'])) { 

  $fileName = null;
  // Si un fichier est envoyé
  if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
    $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
    if ($checkImage !== false) {
      $fileName = slugify(basename($_FILES["file"]["name"]));
      $fileName = uniqid() . '-' . $fileName;

      if (move_uploaded_file($_FILES["file"]["tmp_name"], _HABITATS_IMAGES_FOLDER_ADMIN_ .$fileName)) {
        if (isset($_POST['se_images'])) {
          // On supprime l'ancienne image si on a posté une nouvelle
          unlink(_HABITATS_IMAGES_FOLDER_ADMIN_ . $_POST['se_images']);
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
        unlink(_HABITATS_IMAGES_FOLDER_ADMIN_.$_POST['ha_images']);
      } else {
        $fileName = $_POST['ha_images'];
      }
    }
  }

  $habitat = [
  'ha_name' => $_POST['ha_name'],
  'ha_description' => $_POST['ha_description'],
  'ha_images' => $fileName
  ];
    // Si il n'y a pas d'erreur on peut faire la sauvegarde
  if (!$errors) {
    if (isset($_GET["id"])) {
      $id = (int)htmlentities($_GET["id"]);
    } else {
      $id = null;
    }

    $res = addHabitat($pdo, $_POST['ha_name'], $_POST['ha_description'], $fileName, $id);
    if ($res) {
      $messages[] = 'L\'habitat a bien été sauvegardé';
      if (!isset($_GET["id"])) {
        $habitat = [
        'ha_name' => '',
        'ha_description' => '',
        'ha_images' => ''
        ];
      }
    } else {
      $errors[] = 'Une erreur s\'est produite.';
    }
  }
} ?>

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
if ($habitat) { ?>
  <div class="col-12">
    <form method="POST" enctype="multipart/form-data" class="" >
      <div class="form-group row">
        <label for="ha_name" class="col-md-2 col-form-label">Habitat</label>
        <div class="col-sm-12 col-md-8">
          <input type="text" class="form-control mb-3" id="ha_name" name="ha_name" value="<?= htmlentities($habitat['ha_name']);?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="ha_description" class="col-sm-8 col-md-2 col-form-label">Description</label>
        <div class="col-sm-12 col-md-8">
          <textarea type="text" class="form-control mb-3" id="ha_description" name="ha_description" rows=7 ><?= htmlentities($habitat['ha_description']);?></textarea>
        </div>
      </div>
      
      <?php if (isset($_GET['id']) && isset($habitat['ha_images'])) { ?>
        <p>
          <img src="<?= _HABITATS_IMAGES_FOLDER_ADMIN_ . $habitat['ha_images'] ;?>" alt="image <?= htmlentities($habitat['ha_name'] )?>" width="100">
          <label for="delete_image" class="text-sm">Supprimer l'image</label>
          <input type="checkbox" name="delete_image" id="delete_image">
          <input type="hidden" name="ha_images" value="<?= htmlentities($habitat['ha_images']); ?>">
        </p>
      <?php } ?>
        <p class="text-truncate">
          <input type="file" name="file" id="file" class="form-control btn-sm btn col-sm-12">
        </p>
        <div class="form-group row d-flex justify-content-center">
          <input type="submit" name="addHabitat" class="btn btn-primary btn-sm mb-3 col-sm-3" value="Valider">
        </div>
    </form>
  </div>
<?php } 

require_once "templates/_footer.php";