<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/visit.php';
require_once '../lib/mongo.php';
require_once '../lib/clics.php';
require_once '../jpgraph/src/jpgraph.php';
require_once '../jpgraph/src/jpgraph_bar.php';

$messages =[];
$errors =[];
//echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";

$animals = getAll($client);
$animalsNames = [];
$animalsClics = [];
foreach ($animals as $animal) {
  $animalsNames2 = array_push($animalsNames,$animal['nom']);
  $animalsClics2 = array_push($animalsClics,$animal['clic']);
}
$clic = getClicsByNames($client, 'Jo');
$names = getNamesByClics($client, 8);

$donnees = $animalsClics;
$lbl = $animalsNames;

$largeur = 250;
$hauteur = 200;
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
<?php }
// Initialisation du graphique
$graphe = new Graph($largeur, $hauteur);
// Echelle lineaire ('lin') en ordonnee et pas de valeur en abscisse ('text')
// Valeurs min et max seront determinees automatiquement
$graphe->setScale("textlin");

// Creation de l'histogramme
$histo = new BarPlot($donnees);
// Ajout de l'histogramme au graphique
$graphe->add($histo);

$graphe->xaxis->SetTickLabels($lbl);

// Ajout du titre du graphique
$graphe->title->set("Histogramme");

// Affichage du graphique
$gdImgHandler = $graphe->stroke(_IMG_HANDLER);
$fileName = "imagefile.png";
$graphe->img->Stream($fileName);
echo "<img src='imagefile.png' />";
?>
</div>
</div>
<?php
require_once '../templates/_footer.php'?>