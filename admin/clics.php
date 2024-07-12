<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/visit.php';
require_once '../vendor/autoload.php';


$messages =[];
$errors =[];
echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";

    use MongoDB\Client as Mongo;

    $user = "utilisateur";
    $pwd = 'motdepasse';
    
    $mongo = new Mongo("mongodb://$user:$pwd@127.0.0.1:8090");
    $collection = $mongo->arcadia->animals;
    $result = $collection->find()->toArray();
    
    print_r($result);
    
    ?>

?>


<h3 class="display-5">Suivi des clics</h3>
<div class="row">
<div class="col-md-3 col-sm-6 md-mb-1 mb-3">
<input type="text" class="form-control" id="search-by-name" placeholder="Nom...">
</div>
<div class="col-md-2 col-sm-5 md-mb-1 mb-3 align-items-center d-flex">
<button type="button" class="btn btn-sm btn-primary"  onclick="filterByName();">Chercher</button>
</div>
<div class="col-md-3 col-sm-6 md-mb-1 mb-3 md-ms-5">
<input type="date" class="form-control" id="search-by-date" placeholder="Date...">
</div>
<div class="col-md-2 col-sm-5 md-mb-1 mb-3 align-items-center d-flex">
<button type="button" class="btn btn-sm btn-primary"  onclick="filterByDate();">Chercher</button>
</div>
</div>
<div class="col-md-2 col-sm-5 md-mb-1 mb-3 align-items-center d-flex">
<button type="button" class="btn btn-sm btn-primary"  onclick="showAll();">Tout afficher</button>
</div>
<div class="row" id="results">
    
</div>

</div>

<?php
require_once '../templates/_footer.php'
?>

