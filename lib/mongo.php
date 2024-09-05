<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/ARCADIA/vendor/autoload.php";

if (getenv('mongoDB') !== false) {
    $client = new MongoDB\Client("mongodb+srv://fannyelimar:elimarmdpatlas@cluster1.lqawy.mongodb.net/");
} else {
    $client = new MongoDB\Client("mongodb://localhost:27017");
}
