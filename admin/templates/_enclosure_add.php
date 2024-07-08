<?php 


if (isset($_POST['addEnclos'])) { 
  
  $enclos = [
  'en_name' => $_POST['en_name']
  ];
  // Si il n'y a pas d'erreur on peut faire la sauvegarde
 $enclosureExists = verifyEnclosureExists($pdo, $_POST['en_name']);
 if ($enclosureExists) {
    $errors[] = 'Cet enclos existe déjà';
    echo 'erreur';
  } else {
    $res = addEnclos($pdo, $_POST['en_name']);
    if ($res) {
      $messages[] = 'L\'enclos '.$_POST['en_name'].' a bien été créé';
        $enclos = [
        'en_name' => ''
        ];

    } else {
      $errors[] = 'Une erreur s\'est produite.';
    }
  }
  
  }

  ?>
<?php foreach ($messages as $message) { ?>
  <div class="alert alert-success" role="alert"><?= $message; ?>
  </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
  <div class="alert alert-danger" role="alert"><?= $error; ?>
  </div>
<?php } ?>
<div class="collapse" id="collapseAddEnclosure">

            <form method="POST">
              <label for="en_name" class="col-sm-3 col-form-label">Enclos</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="en_name" name="en_name">
              </div>
              <div class="form-group row d-flex justify-content-center">
                <input type="submit" name="addEnclos" class="btn btn-primary btn-sm col-4 mb-3" value="Valider">
              </div>
            </form>
          </div>