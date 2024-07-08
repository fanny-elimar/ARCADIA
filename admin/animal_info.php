<?php
require_once "templates/_header.php";
require_once  "../lib/pdo.php";
require_once  "../lib/animal.php";
require_once  "../lib/habitat.php";
require_once  "../lib/visit.php";
require_once  "../lib/food.php";
require_once  "../lib/session.php";
?>


    <?php 
    $ha_id = isset($_GET['id']) ? $_GET['id'] : 1;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 1;
    $offset = ($page - 1) * $limit;
    $animals = getAnimalsByHabitat($pdo, $ha_id, $limit, $offset);
    $animal = $animals[0];
    $images = explode(" ",$animal["an_images"]);
    $condition = getLastConditionByAnimalId($pdo, $animal['an_id']);
    $enclosure = getEnclosureByAnimalId($pdo, $animal['an_id']);
    $foods =getFoods($pdo);
    $foodInstructions = getFoodInstructionByAnimalId($pdo, $animal['an_id']);

    

    $habitat = getHabitatById($pdo, $ha_id);
    $totalPages = getNumberOfAnimalsPerHabitat($pdo, $ha_id);


    

    

    // On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


    
    ?>
    <div class="container d-flex justify-content-end">
 
    <a href="habitat_page.php?id=<?=$ha_id;?>" class="btn btn-primary btn-sm mx-1"><?=ucfirst(($habitat["ha_name"]));?></a>

                               <?php if ($page > 1) {?>
                                <a href="?id=<?=$ha_id?>&page=<?=($page-1);?>" class="btn btn-primary btn-sm mx-1">Animal précédent</a> 
                                <?php } ?> 
   
                                <?php if ($page < $totalPages) {?>
                               <a href="?id=<?=$ha_id?>&page=<?=($page+1);?>" class="btn btn-primary btn-sm mx-1">Animal suivant</a>
                               <?php } ?> 
                   </div>

                            
<div class="container">
        <div class="row">
            <div class="col-md-1">
                <h1 class="mb-3"><?=ucfirst(htmlentities($animal["an_name"])); ?></h1>
        </div>
            <div class="col-md-3">
                <img class="card-img-top animal-card-image" src="<?=_ASSETS_IMAGES_FOLDER_.$images[0];?>" alt="Image <?= $animal["an_name"]?>">
            </div>
            <div class="col-md-3">
                <p>Espèce : <?=nl2br(htmlentities($animal["an_species"])); ?></p>
                <p>Habitat : <?=$habitat["ha_name"]; ?></p>
                <?php if ($condition) {?>
                <p>Etat : <?=$condition['vi_condition'] ?>
                <?php 
                    if (isset($_SESSION['user'])) {
                if ($condition['vi_condition_details']) {echo '('.$condition['vi_condition_details'].')' ?></p><?php ;}?>
                <p>Enclos <?=$enclosure['en_name'].' : '.$enclosure['en_comment'] ?></p>
                <?php ;}}?>
                
            </div>

                
                
                              
                
            </div>
            
        </div>
        </div>
        
<?php 

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['us_role']==='admin') {
        require_once "../templates/_food_instruction.php";
        require_once "../templates/_food_given.php";
    }

} 
 ?>
</div>
<?php

require_once __DIR__ ."/templates/_footer.php";

?>