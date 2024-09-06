<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/ARCADIA/vendor/autoload.php";

if (getenv('MONGODB_URI') !== false) {
    $client = new MongoDB\Client("mongodb+srv://arcadiauser:AuNyMxJ5ByDNIvqDd@Cluster1.n9z04.mongodb.net/sample_mflix?retryWrites=true");
} else {
    $client = new MongoDB\Client("mongodb://localhost:27017");
}
