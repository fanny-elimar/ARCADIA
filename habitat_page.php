<?php
require_once __DIR__ ."/templates/_header.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/habitat.php";
require_once __DIR__ . "/lib/animal.php";
require_once __DIR__. "/lib/mongo.php";
require_once __DIR__ . "/lib/clics.php";

$error = false;
if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);
    $habitat = getHabitatById($pdo, $id);
    if (!$habitat) {
        $error = true;
    }
} else {
    $error = true;
} 
if (!$error) { ?>
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
            $animals = getAnimalsByHabitat($pdo, $id, null, null); 
            $animalRank =0;
            foreach ($animals as $animal) {
                $animalRank++;
                if (isset($_POST["updateClic".$animal['an_name']])) { ?>
                    <!--empecher le renvoi du formulaire à l'actualisation de la page-->
                    <script> window.location.href = 'animal_page.php?id=<?=$id;?>&page=<?=$animalRank;?>'; </script>
                    <?php 
                    $res = addClic($client, $animal['an_name']);
                    if ($res) {
                        $messages[] = 'ok';
                    } else {
                        $errors[] = 'Une erreur s\'est produite.';
                    }
                  }
                require __DIR__ . "/templates/_animal_card.php";
            } ?>
        </div>
    </div>
<?php } else { ?>
    <h1>Page introuvable</h1>
<?php } ?>


