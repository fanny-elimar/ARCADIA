<?php

function addVisit(PDO $pdo, string $vi_condition, string $vi_date, string $vi_condition_details=null, int $vi_an_id) {
    $sql = "INSERT INTO arc_visit (vi_condition, vi_date, vi_condition_details, vi_an_id) VALUES (:vi_condition, :vi_date, :vi_condition_details, :vi_an_id);";
    $query = $pdo->prepare($sql);

    $query->bindParam(':vi_condition', $vi_condition, PDO::PARAM_STR);
    $query->bindParam(':vi_date', $vi_date, PDO::PARAM_STR);
    $query->bindParam(':vi_condition_details', $vi_condition_details, PDO::PARAM_STR);
    $query->bindParam(':vi_an_id', $vi_an_id, PDO::PARAM_STR);

    
    return $query->execute(); 
}

function getLastConditionByAnimalId(PDO $pdo, int $an_id) {
    $sql = "SELECT vi_condition, vi_condition_details FROM arc_visit WHERE vi_an_id = :an_id ORDER BY vi_date DESC";
    $query = $pdo->prepare($sql);

    $query->bindParam(':an_id', $an_id, PDO::PARAM_STR);
    $query->execute();

    $condition = $query->fetch(PDO::FETCH_ASSOC);
    return $condition; 
}

function addEnclosureComment(PDO $pdo, string $en_comment, string $en_name) {
    $sql = "UPDATE arc_enclosure SET en_comment = :en_comment WHERE en_name= :en_name;";
    $query = $pdo->prepare($sql);

    $query->bindParam(':en_comment', $en_comment, PDO::PARAM_STR);
    $query->bindParam(':en_name', $en_name, PDO::PARAM_STR);
    
    return $query->execute(); 
}

function getVisits(PDO $pdo) {
    $sql = "SELECT * FROM arc_visit INNER JOIN arc_animal ON arc_visit.vi_an_id=arc_animal.an_id ORDER BY vi_date;";
    $query = $pdo->prepare($sql);
    $query->execute();
    $crs=$query->fetchAll(PDO::FETCH_ASSOC) ;
    return $crs;
}