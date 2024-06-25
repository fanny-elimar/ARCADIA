<?php

function getServiceById(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM arc_service WHERE se_id = :id";

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

function modifyService(PDO $pdo, $id, $info):array|bool
{
    $sql = "UPDATE arc_service SET se_info = :se_info WHERE se_id=:se_id;";

    $query = $pdo->prepare($sql);
    $query->bindParam(':se_id', $id, PDO::PARAM_INT);
    $query->bindParam(':se_info', $info, PDO::PARAM_STR);

    
        return $query->execute();
}