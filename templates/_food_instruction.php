<?php
$errors = [];
$messages = [];

if (isset($_POST['addFoodInstruction'])) { ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace(document.referrer); </script>
    <?php $res = addFoodInstruction($pdo, $animal['an_id'], $_POST['in_fo_id'], $_POST['in_quantity']);
    if ($res) {
        $messages[] = 'Merci pour votre avis.';
    } else {
        $errors[] = 'Une erreur s\'est produite.';
    }
}

if (isset($_POST['addFood'])) { ?>
    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
    <script> location.replace(document.referrer); </script>
    <?php $res = addFood($pdo, $_POST['fo_type']);
    if ($res) {
        $messages[] = 'Merci pour votre avis.';
    } else {
        $errors[] = 'Une erreur s\'est produite.';
    }
}?>
<div class="container">
    <?php if (isset($_SESSION['user'])) {?>
        <div class="border p-3 rounded mt-3">
            <h4>Instructions d'alimentation</h4>
            <div>
                <?php if (!$foodInstructions) {
                    echo 'Il n\'y a pas encore de recommandation d\'alimentation pour cet animal.';
                }; ?>
                <?php if ($_SESSION['user']['us_role']==='employe'||$_SESSION['user']['us_role']==='admin') {
                    foreach ($foodInstructions as $foodInstruction) {?>
                        <div><?= htmlentities($foodInstruction['fo_type']).' : '.htmlentities($foodInstruction['in_quantity']).' g ';?>
                        </div>
                    <?php ;} ?> 
                <?php ;} elseif ($_SESSION['user']['us_role']==='vet') {
                    foreach ($foodInstructions as $foodInstruction) {
                        if (isset($_POST["deleteInstruction".$foodInstruction['in_id']])) { ?>
                            <!--empecher le renvoi du formulaire à l'actualisation de la page-->
                            <script> location.replace(document.referrer); </script>
                            <?php $res = deleteFoodInstruction($pdo, $foodInstruction['in_id']);
                            if ($res) {
                                $messages[] = 'Merci pour votre avis.';
                            } else {
                                $errors[] = 'Une erreur s\'est produite.';
                            }
                        } 
                        if (isset($_POST["modifyInstruction".$foodInstruction['in_id']])) { ?>
                            <!--empecher le renvoi du formulaire à l'actualisation de la page-->
                            <script> location.replace(document.referrer); </script>
                            <?php $res = modifyFoodInstruction($pdo, $foodInstruction['in_id'], $_POST['in_fo_id'], $_POST['in_quantity'] );
                            if ($res) {
                                $messages[] = 'Merci pour votre avis.';
                            } else {
                                $errors[] = 'Une erreur s\'est produite.';
                            }
                        } ?> 
                        <form method="POST">
                            <div class="row my-1 g-1">
                                <div class="col-sm-8 col-md-5">
                                    <select type="text" class="form-control" id="in_fo_id" name="in_fo_id">
                                        <?php foreach ($foods as $food) {?>
                                            <option value="<?=$food['fo_id'];?>" <?php if ($food['fo_id'] == $foodInstruction['in_fo_id']){ echo ' selected="selected"'; } ?>><?=htmlentities($food['fo_type']) ?></option>
                                        <?php ;}?>
                                    </select>
                                </div>
                                <div class="col-sm-3 col-md-2">
                                    <input type="text" name="in_quantity" class="form-control" value='<?= htmlentities($foodInstruction['in_quantity']);?> '>    
                                </div>
                                <div class="col-1"> 
                                    <p> g </p>
                                </div>
                                <div class="col-md-4 row">
                                    <div class="col-sm-4 col-md-4">
                                        <input type="submit" name="<?php echo 'modifyInstruction'.$foodInstruction['in_id'];?>" class="btn btn-primary btn-sm" value="Modifier">
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="submit" name="<?php echo 'deleteInstruction'.$foodInstruction['in_id'];?>" class="btn btn-primary btn-sm" value="Supprimer">
                                    </div> 
                                </div>
                            </div>
                        </form>
                    <?php ;}
                }
                if ($_SESSION['user']['us_role']==='vet') {?>
                    <div>
                        <a class="btn btn-primary btn-sm js-button-ajouter-food col-sm-4 col-md-2 mt-5" data-bs-toggle="collapse" href="#collapseAddFoodInstruction" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-addFood">Ajouter une instruction</a>
                        <a class="btn btn-primary btn-sm js-button-ajouter-food col-sm-6 col-md-3 mt-5" data-bs-toggle="collapse" href="#collapseAddFood" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-addFood">Ajouter un nouveau type de nourriture</a>
                        <div class="collapse mt-3" id="collapseAddFoodInstruction">
                            <form name="addFoodInstruction" method="POST" class="row g-1">             
                            <div class="col-sm-8 col-md-5">
                                    <select type="text" class="form-control" id="in_fo_id" name="in_fo_id">
                                        <?php foreach ($foods as $food) {?>
                                            <option value="<?= $food['fo_id'];?>"><?=htmlentities($food['fo_type']) ?></option>
                                        <?php ;}?>
                                    </select>
                                </div>
                                <div class="col-sm-3 col-md-2">
                                    <input type="text" class="form-control" id="in_quantity" name="in_quantity">
                                </div>
                                <div class="col-1">
                                    <p>g</p>
                                </div>
                                <div class="col-2">
                                    <input type="submit" name="addFoodInstruction" class="btn btn-primary btn-sm" value="Ajouter">
                                </div>
                            </form> 
                        </div>
                        <div class="row mt-3">
                            <form name="addFood" method="POST" class="collapse col-8" id="collapseAddFood">
                                <div class="row">           
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="fo_type" name="fo_type">
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" name="addFood" class="btn btn-primary btn-sm" value="Ajouter">
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                <?php ;} ?>
            </div>
        </div>    
    <?php } ?>
</div>