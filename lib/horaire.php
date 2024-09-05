<?php

function addHoraire(PDO $pdo, string $ho_periode_start, string $ho_periode_end, string $ho_days, string $ho_time_start, string $ho_time_end) {
    $sql = "INSERT INTO arc_horaire (ho_periode_start, ho_periode_end, ho_days, ho_time_start, ho_time_end) VALUES (:ho_periode_start, :ho_periode_end, :ho_days, :ho_time_start, :ho_time_end);";
    $query = $pdo->prepare($sql);

    $query->bindParam(':ho_periode_start', $ho_periode_start, PDO::PARAM_STR);
    $query->bindParam(':ho_periode_end', $ho_periode_end, PDO::PARAM_STR);
    $query->bindParam(':ho_days', $ho_days, PDO::PARAM_STR);
    $query->bindParam(':ho_time_start', $ho_time_start, PDO::PARAM_STR);
    $query->bindParam(':ho_time_end', $ho_time_end, PDO::PARAM_STR);
    
    return $query->execute(); 
}

function getHoraires (PDO $pdo) {
    $sql = "SELECT * FROM arc_horaire;";
    $query = $pdo->prepare($sql);
    $query->execute();
    $horaires = $query->fetchAll(PDO::FETCH_ASSOC);
    return $horaires;
}

function deleteHoraire (PDO $pdo, $ho_id) {
    $sql = "DELETE FROM arc_horaire WHERE ho_id=:ho_id;";
    $query = $pdo->prepare($sql);
    $query->bindParam(':ho_id', $ho_id, PDO::PARAM_INT);
    

    return $query->execute();
}

function updateHoraire(PDO $pdo, string $ho_periode_start, string $ho_periode_end, string $ho_days, string $ho_time_start, string $ho_time_end, int $ho_id) {
    $sql = "UPDATE arc_horaire SET ho_periode_start=:ho_periode_start , ho_periode_end = :ho_periode_end, ho_days=:ho_days, ho_time_start=:ho_time_start, ho_time_end=:ho_time_end WHERE ho_id=:ho_id;";
    $query = $pdo->prepare($sql);

    $query->bindParam(':ho_periode_start', $ho_periode_start, PDO::PARAM_STR);
    $query->bindParam(':ho_periode_end', $ho_periode_end, PDO::PARAM_STR);
    $query->bindParam(':ho_days', $ho_days, PDO::PARAM_STR);
    $query->bindParam(':ho_time_start', $ho_time_start, PDO::PARAM_STR);
    $query->bindParam(':ho_time_end', $ho_time_end, PDO::PARAM_STR);
    $query->bindParam(':ho_id', $ho_id, PDO::PARAM_INT);
    
    return $query->execute(); 
}