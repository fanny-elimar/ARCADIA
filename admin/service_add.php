<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/service.php';
require_once '../lib/tools.php';

$messages = [];
$errors = [];
$service = [
  'se_name' => '',
  'se_description' => '',
  'se_images' => '',
  'se_info' => ''
];

if (isset($_GET['id'])) {
  $id = htmlentities($_GET['id']);
  $service = getServiceById($pdo, $id);
  if (!$service) {
    $errors[] = 'Ce service n\'existe pas';
  }
  $pageTitle = 'Formulaire de modification des services';
} else {
  $pageTitle = 'Formulaire d\'ajout de service';
}

if (isset($_POST['addService'])) { 
  $fileName = null;
  // Si un fichier est envoyé
  if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
    $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
    if ($checkImage !== false) {
      $fileName = slugify(basename($_FILES["file"]["name"]));
      $fileName = uniqid() . '-' . $fileName;
      if (move_uploaded_file($_FILES["file"]["tmp_name"], _SERVICES_IMAGES_FOLDER_ .$fileName)) {
        if (isset($_POST['se_images'])) {
          // On supprime l'ancienne image si on a posté une nouvelle
          unlink(_SERVICES_IMAGES_FOLDER_ . $_POST['se_images']);
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
        unlink(_SERVICES_IMAGES_FOLDER_.$_POST['se_images']);
      } else {
        $fileName = $_POST['se_images'];
      }
    }
  }
  $service = [
  'se_name' => $_POST['se_name'],
  'se_description' => $_POST['se_description'],
  'se_images' => $fileName,
  'se_info' => $_POST['se_info']
  ];

  if (!$errors) {
    if (isset($_GET["id"])) {
      $id = (int)htmlentities($_GET["id"]);
    } else {
      $id = null;
    }
    $res = addService($pdo, $_POST['se_name'], $_POST['se_description'], $fileName,  $_POST['se_info'], $id);
    if ($res) {
      $messages[] = 'Le service a bien été sauvegardé';
      if (!isset($_GET["id"])) {
        $service = [
        'se_name' => '',
        'se_description' => '',
        'se_images' => '',
        'se_info' => ''
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
if ($service) { ?>
  <div class="" >
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="se_name" class="col-md-4 col-form-label">Service</label>
        <div class="col-sm-12 col-md-8">
          <input type="text" class="form-control mb-3" id="se_name" name="se_name" value="<?= htmlentities($service['se_name']);?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="se_description" class="col-sm-8 col-md-4 col-form-label">Description</label>
        <div class="col-sm-12 col-md-8">
          <textarea type="text" class="form-control mb-3" id="se_description" name="se_description" rows=7 ><?= htmlentities($service['se_description']);?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="se_info" class="col-sm-8 col-md-4 col-form-label">Détails</label>
        <div class="col-sm-12 col-md-8">
          <textarea type="text" class="form-control mb-3" id="se_info" name="se_info" rows=5><?= htmlentities($service['se_info']);?></textarea>
        </div> 
      </div>
      <?php if (isset($_GET['id']) && isset($service['se_images'])) { ?>
        <p>
          <img src="<?= _SERVICES_IMAGES_FOLDER_ . $service['se_images'] ;?>" alt="image<?= htmlentities($service['se_name']) ?>" width="100">
          <label for="delete_image" class="text-sm">Supprimer l'image</label>
          <input type="checkbox" name="delete_image" id="delete_image">
          <input type="hidden" name="se_images" value="<?= htmlentities($service['se_images']); ?>">
        </p>
      <?php } ?>
      <p class="text-truncate">
        <input type="file" name="file" id="file" class="form-control btn-sm btn col-sm-12">
      </p>
      <div class="form-group row d-flex justify-content-center">
        <input type="submit" name="addService" class="btn btn-primary btn-sm mb-3 col-sm-3" value="Valider">
      </div>
    </form>
  </div>
<?php } 

require_once "templates/_footer.php";