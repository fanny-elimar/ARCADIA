<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/visit.php';

$crs=getVisits($pdo);
$crs_json = json_encode($crs);
$messages =[];
$errors =[];
?>

<script> var crs = JSON.parse('<?=$crs_json?>');</script>
<h1>Comptes-rendus du vétérinaire</h1>
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
<script src="../script4.js"></script>
