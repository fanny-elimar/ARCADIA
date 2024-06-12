<?php

function getServiceById(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM arc_service WHERE ha_id = :id";

    $query = $pdo->prepare($sql);
    
    $query->bindValue(":id", $id, PDO::PARAM_INT);


    $query->execute();
    $service = $query->fetch(PDO::FETCH_ASSOC);

    return $service;
}

function getServices(PDO $pdo):array|bool
{
    $sql = "SELECT * FROM arc_service";

    $query = $pdo->prepare($sql);


    $query->execute();
    $services = $query->fetchAll(PDO::FETCH_ASSOC);

    return $services;
}