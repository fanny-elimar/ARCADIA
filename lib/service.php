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

function addService(PDO $pdo,string $se_name,string $se_description,string|null $se_images,string $se_info,int $id = null):array|bool
{
    if ($id === null) {
        $sql1 = "INSERT INTO arc_service (se_name, se_description, se_images, se_info) VALUES (:se_name, :se_description, :se_images, :se_info);";
        $query=$pdo->prepare($sql1);
    } else {
        $sql2 = "UPDATE arc_service SET se_name = :se_name, se_description = :se_description, se_images = :se_images, se_info = :se_info WHERE se_id=:se_id;";
        $query=$pdo->prepare($sql2);
        $query->bindParam(':se_id', $id, PDO::PARAM_INT);
    }

    $query->bindParam(':se_name', $se_name, PDO::PARAM_STR);
    $query->bindParam(':se_description', $se_description, PDO::PARAM_STR);
    $query->bindParam(':se_images', $se_images, PDO::PARAM_STR);
    $query->bindParam(':se_info', $se_info, PDO::PARAM_STR);

    
        return $query->execute();
}

function deleteService (PDO $pdo,int $id) {
 $sql = "DELETE FROM arc_service WHERE se_id=:se_id;";
$query = $pdo->prepare($sql);
$query->bindValue(':se_id', $id, PDO::PARAM_INT);
return $query->execute();
}