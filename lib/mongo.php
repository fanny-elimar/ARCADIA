<?php 

$mongo_db = getenv('MONGODB_URI');

if (getenv('MONGODB_URI') !== false) {
    require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
    $client = new MongoDB\Client($mongo_db);
} else {
    require_once $_SERVER['DOCUMENT_ROOT']."/ARCADIA/vendor/autoload.php";
    $client = new MongoDB\Client("mongodb://localhost:27017");
}
