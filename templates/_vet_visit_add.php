<?php


$errors = [];
$messages = [];

if (isset($_POST['addEnclosureComment'])) {   /*
    @todo ajouter la vérification sur les champs
*/
?>
<!--empecher le renvoi du formulaire à l'actualisation de la page-->
<script> location.replace(document.referrer); </script>
<?php 

$res2 = addEnclosureComment($pdo, $_POST['en_comment'], $enclosure['en_id']);
if ($res2) {
    $messages[] = 'Merci pour votre avis.';
} else {
    $errors[] = 'Une erreur s\'est produite.';
}

}

if (isset($_POST['addFoodInstruction'])) {   /*
    @todo ajouter la vérification sur les champs
*/
?>
<!--empecher le renvoi du formulaire à l'actualisation de la page-->
<script> location.replace(document.referrer); </script>
<?php 

$res3 = addFoodInstruction($pdo, $animal['an_id'], $_POST['in_fo_id'], $_POST['in_quantity']);
if ($res3) {
    $messages[] = 'Merci pour votre avis.';
} else {
    $errors[] = 'Une erreur s\'est produite.';
}

}

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
<div class="border p-3 rounded">
<h4>Enclos <?= $enclosure['en_name'];?></h4>
<form name="addEnclosureComment" method="POST" class="row">

    <div class="col-6">
<input type="text" class="form-control" id="en_comment" name="en_comment" value="<?=$enclosure['en_comment'];?>" placeholder="Remarque...">
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

<div class="border p-3 rounded mt-3">
<h4>Instructions d'alimentation</h4>
<div><?php foreach ($foodInstructions as $foodInstruction) {

    if (isset($_POST["deleteInstruction".$foodInstruction['in_id']])) {   /*
    @todo ajouter la vérification sur les champs
*/
?>
<!--empecher le renvoi du formulaire à l'actualisation de la page-->
<script> location.replace(document.referrer); </script>
<?php 

$res4 = deleteFoodInstruction($pdo, $foodInstruction['in_id']);
if ($res4) {
    $messages[] = 'Merci pour votre avis.';
} else {
    $errors[] = 'Une erreur s\'est produite.';
}

} 

if (isset($_POST["modifyInstruction".$foodInstruction['in_id']])) {   /*
    @todo ajouter la vérification sur les champs
*/
?>
<!--empecher le renvoi du formulaire à l'actualisation de la page-->
<script> location.replace(document.referrer); </script>
<?php 

$res5 = modifyFoodInstruction($pdo, $foodInstruction['in_id'], $_POST['in_fo_id'], $_POST['in_quantity'] );
if ($res5) {
    $messages[] = 'Merci pour votre avis.';
} else {
    $errors[] = 'Une erreur s\'est produite.';
}

} ?> 

    
    <form method="POST">
        <div class="row my-1">
    <div class="col-3 ">
    <select type="text" class="form-control" id="in_fo_id" name="in_fo_id">
                <?php foreach ($foods as $food) {?>
                <option value="<?= $food['fo_id'];?>" <?php if ($food['fo_id'] == $foodInstruction['in_fo_id']){ echo ' selected="selected"'; } ?>><?=$food['fo_type'] ?></option>
                <?php ;}?>
                
 
            </select></div>
    <div class="col-3"><input type="text" name="in_quantity" class="form-control" value='<?= $foodInstruction['in_quantity'];?> '>    </div>
    <div class="col-1"> <p> g <?= $foodInstruction['in_id']; ?></p></div>
    <div class="col-2"><input type="submit" name="<?php echo 'modifyInstruction'.$foodInstruction['in_id'];?>" class="btn btn-primary btn-sm" value="Modifier"></div>
    <div class="col-2"><input type="submit" name="<?php echo 'deleteInstruction'.$foodInstruction['in_id'];?>" class="btn btn-primary btn-sm" value="Supprimer"></div>
     </div>

    </form>
   
<?php ;}?>
   
</div>


<form name="addFoodInstruction" method="POST" class="row">



<div class="row">           
    <div class="col-4">
    <select type="text" class="form-control" id="in_fo_id" name="in_fo_id">
                <?php foreach ($foods as $food) {?>
                <option value="<?= $food['fo_id'];?>"><?=$food['fo_type'] ?></option>
                <?php ;}?>
                
 
            </select>
        </div>
            <div class="col-4">
                <input type="text" class="form-control" id="in_quantity" name="in_quantity">
            </div>
            <div class="col-2"><p>g</p></div>
            <div class="col-2">
            <input type="submit" name="addFoodInstruction" class="btn btn-primary btn-sm" value="Ajouter">
            </div>
</div> 

        </form>
</div>



</div>
  