<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/ARCADIA/vendor/autoload.php";

if (getenv('MONGODB_URI') !== false) {
    $client = new MongoDB\Client("mongodb+srv://arcadiauser:AuNyMxJ5ByDNIvqDd@cluster1.lqawy.mongodb.net/");
} else {
    $client = new MongoDB\Client("mongodb://localhost:27017");
}
