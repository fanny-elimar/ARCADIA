<?php 
//require_once $_SERVER['DOCUMENT_ROOT']."/ARCADIA/vendor/autoload.php";
//require_once  "./vendor/autoload.php";
//var_dump($_SERVER['DOCUMENT_ROOT']);

if (getenv('MONGODB_URI') !== false) {
    require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
    $client = new MongoDB\Client("mongodb+srv://fannyelimar:elimarmdpatlas@cluster1.lqawy.mongodb.net/");
} else {
    require_once $_SERVER['DOCUMENT_ROOT']."/ARCADIA/vendor/autoload.php";
    $client = new MongoDB\Client("mongodb://localhost:27017");
}
