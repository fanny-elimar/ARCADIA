<?php

function getHabitatById(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM arc_habitat WHERE ha_id = :id";

    $query = $pdo->prepare($sql);
    
    $query->bindValue(":id", $id, PDO::PARAM_INT);


    $query->execute();
    $habitats = $query->fetch(PDO::FETCH_ASSOC);

    return $habitats;
}

function getHabitats(PDO $pdo):array|bool
{
    $sql = "SELECT * FROM arc_habitat";

    $query = $pdo->prepare($sql);


    $query->execute();
    $habitats = $query->fetchAll(PDO::FETCH_ASSOC);

    return $habitats;
}

function getHabitatByName(PDO $pdo, string $name):array|bool
{
    $sql = "SELECT * FROM arc_habitat WHERE ha_name = :name";

    $query = $pdo->prepare($sql);
    
    $query->bindValue(":name", $name, PDO::PARAM_INT);


    $query->execute();
    $habitat = $query->fetch(PDO::FETCH_ASSOC);

    return $habitat;
}