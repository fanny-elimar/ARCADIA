<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/visit.php';
require_once '../lib/mongo.php';
require_once '../lib/clics.php';



$messages =[];
$errors =[];
//echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";

$animals = getAll($client);
$clic = getClicsByNames($client, 'Jo');
$names = getNamesByClics($client, 8);

?>




<h1>Suivi des clics</h1>
<h2>Liste des animaux</h2>
<?php foreach($animals as $animal) {?>
<div>
  <p><?= $animal['nom']?></p>
  <p><?= $animal['clic']?></p>
</div>
<?php }?>


<div>
  <h2>Liste des animaux où le nombre de clic est égal à 8</h2>
  <?php foreach($names as $name) {?>
<div>
  <p><?= $name['nom']?></p>
  <p><?= $name['clic']?></p>
</div>
<?php }?>
</div>
</div>
<?php
require_once '../templates/_footer.php'
?>

