<?php
$errors = [];
$messages = [];

if (isset($_POST['addReview'])) {   /*
        @todo ajouter la vérification sur les champs
    */
    ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace("index.php"); </script>
    <?php 
    
    $res = addReview($pdo, htmlspecialchars($_POST['re_pseudo']), $_POST['re_review']);
    if ($res) {
        $messages[] = 'Merci pour votre avis.';
    } else {
        $errors[] = 'Une erreur s\'est produite.';
    }
    
}

?>

  <p>
  <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseExample">
    Laisser un avis
  </a>
</p>
<div class="collapse" id="collapseForm">
<form method="POST">
        <div class="mb-3">
            <label for="re_pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="re_pseudo" name="re_pseudo">
        </div>
        <div class="mb-3">
            <label for="re_review" class="form-label">Avis</label>
            <textarea rows="4"class="form-control" id="re_review" name="re_review"></textarea>
        </div>

        <input type="submit" name="addReview" class="btn btn-primary btn-sm" value="Enregistrer">

    </form>
</div>