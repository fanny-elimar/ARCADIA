<?php


$errors = [];
$messages = [];

$today = date('Y-m-d');
$foodGiven = getFoodGivenByAnimalId($pdo, $animal['an_id'], $today);


if (isset($_POST['addFoodGiven'])) { ?>
<!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace(document.referrer); </script>
    <?php 
    $res7 = addFoodGiven($pdo, $animal['an_id'], $_POST['fe_fo_id'], $_POST['fe_quantity'],  $_POST['fe_date'], $_POST['fe_time']);
    if ($res7) {
        $messages[] = 'Merci pour votre avis.';
    } else {
        $errors[] = 'Une erreur s\'est produite.';
    }
} ?>

<div class="container container-flux">
    <div class="border p-3 rounded mt-3">
        <h4>Alimentation fournie</h4>
        <?php if ($_SESSION['user']['us_role']==='employe') {?>
        <div>
            <form method="POST">
                <div class="row my-1 g-1">
                    <div class="col-sm-5">
                        <select type="text" class="form-control" id="fe_fo_id" name="fe_fo_id">
                            <?php foreach ($foods as $food) {?>
                                <option value="<?=$food['fo_id'];?>"><?= htmlentities($food['fo_type']) ?>
                                </option> 
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="col-2"><input type="text" name="fe_quantity" class="form-control">    
                    </div>
                    <div class="col-1"> <p> g </p>
                    </div>
                    <div class="col-2"><input type="date" name="fe_date" class="form-control"> 
                    </div>
                    <div class="col-2"><input type="time" name="fe_time" class="form-control">    
                    </div>
                    <div class="col-md-4 row">
                        <div class="col-sm-3 col-md-5">
                            <input type="submit" name="addFoodGiven" class="btn btn-primary btn-sm" value="Ajouter">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php ;} ?>
        <?php foreach($foodGiven as $foodGivenItem) {
            if (isset($_POST['deleteFoodGiven'.$foodGivenItem['fe_id']])) { ?>
                <!--empecher le renvoi du formulaire à l'actualisation de la page-->
                <script> location.replace(document.referrer); </script>
                <?php 
                $res10 = deleteFoodGiven($pdo, $foodGivenItem['fe_id']);
                if ($res10) {
                    $messages[] = 'Merci pour votre avis.';
                } else {
                    $errors[] = 'Une erreur s\'est produite.';
                }
            } ?>
            <div>
                <div class="row border-top pt-1">
                    <div class="col-3"><p><?= htmlentities($foodGivenItem['fo_type']); ?></p>
                </div>
                <div class="col-2"><p><?= htmlentities($foodGivenItem['fe_quantity']); ?> g</p>
                </div>
                <div class="col"><p><?= date('d/m/y',strtotime(htmlentities($foodGivenItem['fe_date']))); ?>   <?= date('H:i',strtotime(htmlentities($foodGivenItem['fe_time']))); ?></p>
                </div>
                <?php if ($_SESSION['user']['us_role']==='employe') {?>
                <div class="col">
                    <form method="POST">
                    <input type="submit" name="<?php echo 'deleteFoodGiven'.$foodGivenItem['fe_id'];?>" class="btn btn-primary btn-sm" value="Supprimer">
                    </form>
                </div> <?php ;} ?>
            </div>
        <?php ;} ?>
    </div>
</div>
        </div>



