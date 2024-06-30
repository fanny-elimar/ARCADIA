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

function addHabitat(PDO $pdo,string $ha_name,string $ha_description,string|null $ha_images, int $id = null):array|bool
{
    if ($id === null) {
        $sql1 = "INSERT INTO arc_habitat (ha_name, ha_description, ha_images) VALUES (:ha_name, :ha_description, :ha_images);";
        $query=$pdo->prepare($sql1);
    } else {
        $sql2 = "UPDATE arc_habitat SET ha_name = :ha_name, ha_description = :ha_description, ha_images = :ha_images WHERE ha_id=:ha_id;";
        $query=$pdo->prepare($sql2);
        $query->bindParam(':ha_id', $id, PDO::PARAM_INT);
    }

    $query->bindParam(':ha_name', $ha_name, PDO::PARAM_STR);
    $query->bindParam(':ha_description', $ha_description, PDO::PARAM_STR);
    $query->bindParam(':ha_images', $ha_images, PDO::PARAM_STR);
    
        return $query->execute();
}

function deleteHabitat (PDO $pdo,int $id) {
 $sql = "DELETE FROM arc_habitat WHERE ha_id=:ha_id;";
$query = $pdo->prepare($sql);
$query->bindValue(':ha_id', $id, PDO::PARAM_INT);
return $query->execute();
}