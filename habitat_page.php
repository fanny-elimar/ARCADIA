<?php
require_once __DIR__ ."/templates/_header.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/habitat.php";
require_once __DIR__ . "/lib/animal.php";


$error = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $habitat = getHabitatById($pdo, $id);

    if (!$habitat) {
        $error = true;
    }
} else {
    $error = true;
}
?>


<?php if (!$error) { ?>

        <div >
            <h1 class="mb-3"><?=ucfirst(htmlentities($habitat["ha_name"])); ?></h1>
            <p><?=nl2br(htmlentities($habitat["ha_description"])); ?></p>
        </div>

        <div>
            <p>Dans cet espace, vous pourrez rencontrer les animaux suivants.</p>
        </div>


  <div class="container">
<div class="d-flex flex-wrap justify-content-around">
        <?php 
        
        $animals = getAnimalsByHabitat($pdo, $id); 

        foreach ($animals as $animal) {
            
            require __DIR__ . "/templates/_animal_card.php";
        } ?>
  </div>
</div>
        

<?php } else { ?>
    <h1>Page introuvable</h1>
<?php } ?>