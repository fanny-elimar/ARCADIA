<?php
require_once __DIR__ ."/templates/_header.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/animal.php";


$error = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $animal = getAnimalById($pdo, $id);
    $habitat = getHabitatByAnimalId($pdo, $id);
    $images=explode(" ",$animal["an_images"]);

    if (!$animal) {
        $error = true;
    }
} else {
    $error = true;
}
?>


<?php if (!$error) { ?>
    <div class="container d-flex justify-content-end">
    <?php 
    var_dump($_GET);
    die;
   $currentPage = $_GET['page']; 
   if(!$currentPage) { $currentPage = 1 ;};
   $pagination = [];

   $nbOfPages = sizeof($animal);
   var_dump($nbOfPages);

if ($currentPage !== 1) {
    $pagination[] = [
        'page' => 'Previous',
        'link' => '?page=' . ($currentPage - 1),
        'active' => false,
    ];
}

for($i = 1; $i <= $nbOfPages; $i++) {
   $pagination[] = [
      'page' => $i,
      'link' => '?page=' . $i,
      'active' => ( $i === $currentPage ),
   ];
}

if ($currentPage !== $nbOfPages) {
    $pagination[] = [
        'page' => 'Next',
        'link' => '?page=' . ($currentPage + 1),
        'active' => false,
    ];
}

   ?>

                            <a href="#" class="btn btn-primary btn-sm"><?=ucfirst(($habitat["ha_name"]));?></a>

                            <a href="#" class="btn btn-primary btn-sm mx-3">Animal précédent</a>  

                            <a href="animal_page.php?id=<?=$animal['an_id'];?>" class="btn btn-primary btn-sm">Animal suivant</a>

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
                <p>Etat : <?="A compléter" ?></p>
            </div>

                
                
                              
                
            </div>
            
        </div>
        </div>
        

<?php } else { ?>
    <h1>Page introuvable</h1>
<?php } ?>