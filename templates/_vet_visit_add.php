<?php


$errors = [];
$messages = [];

if (isset($_POST['addVisit'])) {   /*
        @todo ajouter la vérification sur les champs
    */
    ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace(document.referrer); </script>
    <?php 
    
    $res = addVisit($pdo, $_POST['vi_condition'], $_POST['vi_date'], $_POST['vi_condition_details'], $animal['an_id']);
    if ($res) {
        $messages[] = 'Merci pour votre avis.';
    } else {
        $errors[] = 'Une erreur s\'est produite.';
    }
    
}

?>
<div class="container container-flux">
<h3 class="mt-3">Compte-rendu de visite</h3>

<form method="POST">
        <div class="mb-3 form-group row">
            <label for="vi_condition" class="col-sm-2 col-form-label">Etat</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="vi_condition" name="vi_condition">
</div>
        </div>
        <div class="mb-3 form-group row">
            <label for="vi_date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-8">
            <input type="date" class="form-control date" id="vi_date" name="vi_date" value="<?php echo date('Y-m-d') ;?>">
        </div>
        </div>
        <div class="mb-3 form-group row">
            <label for="vi_condition_details" class="col-sm-2 col-form-label">Remarque</label>
            <div class="col-sm-8">
            <textarea class="form-control" rows="4" id="vi_condition_details" name="vi_condition_details"></textarea>
        </div>
        </div>

        <input type="submit" name="addVisit" class="btn btn-primary btn-sm" value="Enregistrer">

    </form>

</div>
  