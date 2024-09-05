<?php if (isset($_POST['addImage'])) { ?>
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
            /* On déplace le fichier uploadé dans notre dossier upload */
            if (move_uploaded_file($_FILES["extraFile"]["tmp_name"], _ANIMALS_IMAGES_FOLDER_ADMIN_ .$extraFileName)) {
                echo 'Bravo';
            } else {
            $errors[] = 'Le fichier n\'a pas été uploadé';
            }
        } else {
        $errors[] = 'Le fichier doit être une image';
        }
    } 
    // Si il n'y a pas d'erreur on peut faire la sauvegarde
    if (!$errors) {
        if (isset($_GET["id"])) {
            $id = (int)htmlentities($_GET["id"]);
        } else {
            $id = null;
        }
        $res = addImage ($pdo, $extraFileName, $id);
        if ($res) {
            $messages[] = 'L\'image a bien été sauvegardée';
        } else {
        $errors[] = 'Une erreur s\'est produite.';
        } 
    }
}
?>
<div class="row">
    <?php if (isset($extraImages)) {
        foreach ($extraImages as $extraImage) {
            if (isset($_POST["deleteImage".$extraImage['im_an_id']])) { ?>
                <!--empecher le renvoi du formulaire à l'actualisation de la page-->
                <script> location.replace(document.referrer); </script>
                <?php $res = deleteImage($pdo, $extraImage['im_an_id']);
                if ($res) {
                    $messages[] = 'Merci pour votre avis.';
                } else {
                    $errors[] = 'Une erreur s\'est produite.';
                } 
            } ?> 
            <div class="col-2">
                <img src="<?= _ANIMALS_IMAGES_FOLDER_ADMIN_ . $extraImage['im_an_filename'] ;?>" alt="image<?=htmlentities($animal['an_name']) ?>" width="100">
                <form method='POST'>
                    <button type="submit" name= "<?php echo 'deleteImage'.$extraImage['im_an_id'];?>" class="btn btn-primary btn-sm my-1" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image <?= $extraImage['im_an_filename']?>?')"><img src="../assets/icones/delete.png" height="15">
                    </button>
                </form>
            </div>
        <?php }
    } else {
        echo 'pas d\'image';
    } ?>
</div>
<a class="btn btn-primary btn-sm js-button-ajouter-images my-3" data-bs-toggle="collapse" href="#collapseAddImages" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-ajouter-image">Ajouter d'autres photos</a>
<div class="collapse" id="collapseAddImages">
    <form method="POST" enctype="multipart/form-data">
        <p class="text-truncate">
            <input type="file" name="extraFile" id="extraFile" class="form-control btn-sm btn col-sm-12">
        </p>
        <input type="submit" name="addImage" class="btn btn-primary btn-sm col-4" value="Ajouter"></div>
    </form>
</div>