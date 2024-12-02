<?php
require_once __DIR__ ."/templates/_header.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/animal.php";
require_once __DIR__ . "/lib/habitat.php";
require_once __DIR__ . "/lib/visit.php";
require_once __DIR__ . "/lib/food.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__. "/lib/mongo.php";
require_once __DIR__ . "/lib/clics.php";

$ha_id = isset($_GET['id']) ? htmlentities($_GET['id']) : 1;
$page = isset($_GET['page']) ? htmlentities($_GET['page']) : 1;
$limit = 1;
$offset = ($page - 1) * $limit;
$animals = getAnimalsByHabitat($pdo, $ha_id, $limit, $offset);
$animal = $animals[0];
$image = $animal['an_images'];
$extraImages= getExtraImagesByAnimalId($pdo, $animal['an_id']);
$condition = getLastConditionByAnimalId($pdo, $animal['an_id']);
$enclosure = getEnclosureByAnimalId($pdo, $animal['an_id']);
$foods =getFoods($pdo);
$foodInstructions = getFoodInstructionByAnimalId($pdo, $animal['an_id']);
$habitat = getHabitatById($pdo, $ha_id);
$totalPages = getNumberOfAnimalsPerHabitat($pdo, $ha_id);

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
} ?>

<div class="container d-flex justify-content-end mb-3">
    <a href="habitat_page.php?id=<?=$ha_id;?>" class="btn btn-primary btn-sm mx-1"><?=ucfirst(($habitat["ha_name"]));?></a>
    <?php if ($page > 1) {?>
        <a href="?id=<?=$ha_id?>&page=<?=($page-1);?>" class="btn btn-primary btn-sm mx-1">Animal précédent</a> 
    <?php } ?> 
    <?php if ($page < $totalPages) {?>
        <a href="?id=<?=$ha_id?>&page=<?=($page+1);?>" class="btn btn-primary btn-sm mx-1">Animal suivant</a>
    <?php } ?> 
</div>
<div class="container light pt-3">
    <div class="col-5 col-md-2">
        <h1 class="mb-3"><?=ucfirst(htmlentities($animal["an_name"])); ?></h1>
    </div>
    <div class="row">
        <div class="<?php if (isset($_SESSION['user']) && $_SESSION['user']['us_role']==='vet') {echo 'col-4 col-sm-3';} ?> col-md-6 mb-3">
            <img class="img-fluid" src="<?=_ANIMALS_IMAGES_FOLDER_.$image;?>" alt="Image <?=htmlentities($animal["an_name"])?>" >
        </div>
        <?php if (!isset($_SESSION['user']) || $_SESSION['user']['us_role']!=='vet') {?>
            <div class="col-md-3">
                <p>Espèce : <?=nl2br(htmlentities($animal["an_species"])); ?></p>
                <p>Habitat : <?=htmlentities($habitat["ha_name"]); ?></p>
                <?php if (!$condition) {?>
                    <p>Etat : non renseigné </p>
                <?php } else {?>    
                    <p>Etat : <?=htmlentities($condition['vi_condition']) ?>
                    <?php if (isset($_SESSION['user'])) {
                        if ($condition['vi_condition_details']) {echo '('.htmlentities($condition['vi_condition_details']).')' ?></p>
                        <?php ;}
                    }
                }
                if (isset($_SESSION['user'])) {
                    if ($enclosure['en_comment']) {?> 
                        <p>Enclos <?=htmlentities($enclosure['en_name']).' : '.htmlentities($enclosure['en_comment']) ?></p> 
                    <?php } else {?> 
                        <p>Enclos <?=htmlentities($enclosure['en_name'])?></p>  
                    <?php ;}
                }?>
            </div> 
        <?php }?>
    </div>
</div>        
        
<?php 

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['us_role']==='vet') {
        require_once __DIR__ ."/templates/_vet_visit.php";
        require_once __DIR__ ."/templates/_food_instruction.php";
        require_once __DIR__ ."/templates/_food_given.php";
    }
    elseif ($_SESSION['user']['us_role']==='employe') {
        require_once __DIR__ ."/templates/_food_instruction.php";
        require_once __DIR__ ."/templates/_food_given.php";
    }
} ?>

<?php if ($extraImages) {?>
    <div class="container mt-5">
        <h4>Quelques photos de <?=htmlentities($animal['an_name'])?> en plus...</h4>
        <div class="row">
            <?php foreach ($extraImages as $extraImage) {?>
                <div class="d-flex  col-sm-11 col-md-5 col-lg-4 mb-3 " >
                    <img src="<?= _ANIMALS_IMAGES_FOLDER_.$extraImage['im_an_filename'];?>" class="img-fluid rounded">
                </div>
            <?php ; }?>
        </div>  
    </div>
<?php } 

require_once __DIR__ ."/templates/_footer.php";
?>