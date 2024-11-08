<?php
require_once '../lib/config.php';
require_once '../lib/pdo.php';

$sql = "SELECT * FROM arc_visit INNER JOIN arc_animal ON arc_visit.vi_an_id=arc_animal.an_id ORDER BY vi_date;";
$query = $pdo->prepare($sql);
$query->execute();
$crs=$query->fetchAll(PDO::FETCH_OBJ) ;
header('Content-Type: application/json');
echo json_encode($crs, JSON_PRETTY_PRINT);

?>