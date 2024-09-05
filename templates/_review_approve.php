<?php $draftReviews = getDraftReviews($pdo);
foreach ($draftReviews as $draftReview) {
    if (isset($_POST['approveReview'.$draftReview['re_id']])) { ?>
        <!--empecher le renvoi du formulaire à l'actualisation de la page-->
        <script> location.replace(document.referrer); </script>
        <?php $res = approveReview($pdo, $draftReview['re_id']);
        if ($res) {
            $messages[] = 'Merci pour votre avis.';
        } else {
            $errors[] = 'Une erreur s\'est produite.';
        }
    }
    if (isset($_POST['deleteReview'.$draftReview['re_id']])) { ?>
        <!--empecher le renvoi du formulaire à l'actualisation de la page-->
        <script> location.replace(document.referrer); </script>
        <?php $res = deleteReview($pdo, $draftReview['re_id']);
        if ($res) {
            $messages[] = 'Merci pour votre avis.';
        } else {
            $errors[] = 'Une erreur s\'est produite.';
        }
    } ?>
    <div class="comment border p-1 my-3">
        <p class="m-1"><?=htmlentities($draftReview["re_review"]);?></p>
        <p class="m-1"><?= htmlentities($draftReview["re_pseudo"]).' le '.date('d/m/y',strtotime(htmlentities($draftReview["re_date"])));?></p>
        <div class="row">
            <form method="POST">
                <input type="submit" name="<?php echo 'approveReview'.$draftReview['re_id'];?>" class="btn btn-primary btn-sm" value="Valider">
                <input type="submit" name="<?php echo 'deleteReview'.$draftReview['re_id'];?>" class="btn btn-primary btn-sm" value="Supprimer">
            </form>
        </div>
    </div>
<?php ;} ?>