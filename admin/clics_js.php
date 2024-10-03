<?php
require_once 'templates/_header.php';
require_once '../lib/mongo.php';
require_once '../lib/clics.php';

$animals = getAll($client);
$animals_json = json_encode($animals);
$count = count($animals);
$step=10;
$nbOfButtons = ceil($count/$step);
?>
    <div class="container d-block">
        <h1>Suivi des clics</h1>
        <h6>Classement des animaux</h6>
        <?php for ( $i=0; $i<=$nbOfButtons-1;$i++) {?>
            <button type="submit" class="btn btn-primary btn-sm mx-1" onclick="getTenAnimals(<?= $i*10 ?>)"><?= (10*$i)+1?> à <?= 10*($i+1);?>
            </button>
        <?php ;}?>
        <div id="canva">
        </div>
    </div>
</div>
<?php
require_once '../templates/_footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>  var animals = JSON.parse('<?=$animals_json?>');</script>
<script src="../script_graph_clic.js"></script>