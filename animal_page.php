<?php
require_once __DIR__ ."/templates/_header.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/animal.php";


$error = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $animal = getAnimalById($pdo, $id);

    if (!$animal) {
        $error = true;
    }
} else {
    $error = true;
}
?>


<?php if (!$error) { ?>

        <div >
            <h1 class="mb-3"><?=ucfirst(htmlentities($animal["an_name"])); ?></h1>
            <p><?=nl2br(htmlentities($animal["an_species"])); ?></p>
        </div>

        

<?php } else { ?>
    <h1>Page introuvable</h1>
<?php } ?>