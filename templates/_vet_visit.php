<?php
$errors = [];
$messages = [];

if (isset($_POST['addEnclosureComment'])) { ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace(document.referrer); </script>
    <?php $res = addEnclosureComment($pdo, $_POST['en_comment'], $enclosure['en_id']);
    if ($res) {
        $messages[] = 'Merci pour votre avis.';
    } else {
        $errors[] = 'Une erreur s\'est produite.';
    }
}

if (isset($_POST['addVisit'])) { ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace(document.referrer); </script>
    <?php $res = addVisit($pdo, $_POST['vi_condition'], $_POST['vi_date'], $_POST['vi_condition_details'], $animal['an_id']);
    if ($res) {
        $messages[] = 'Merci pour votre avis.';
    } else {
        $errors[] = 'Une erreur s\'est produite.';
    }
} ?>

<div class="container">
    <h3 class="mt-3">Compte-rendu de visite</h3>
    <div class="border p-3 rounded">
        <h4>Enclos <?= htmlentities($enclosure['en_name']);?></h4>
        <form name="addEnclosureComment" method="POST" class="row">
            <div class="col-6">
                <input type="text" class="form-control" id="en_comment" name="en_comment" value="<?=htmlentities($enclosure['en_comment']);?>" placeholder="Remarque...">
            </div>
            <div class="col-3">
                <input type="submit" name="addEnclosureComment" class="btn btn-primary btn-sm" value="Modifier">
            </div>
        </form>
    </div>
    <div class="border p-3 rounded mt-3">
        <h4>Animal</h4>
        <form name="addVisit" method="POST">
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
            <input type="submit" name="addVisit" class="btn btn-primary btn-sm col-2" value="Enregistrer">
        </form>
    </div>
</div>