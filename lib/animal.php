<?php 
function getAnimalsByHabitat(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM arc_animal WHERE an_ha_id = :id";

    $query = $pdo->prepare($sql);
    
    $query->bindValue(":id", $id, PDO::PARAM_INT);


    $query->execute();
    $animals = $query->fetchAll(PDO::FETCH_ASSOC);

    return $animals;
}

function getAnimalById(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM arc_animal WHERE an_id = :id";

    $query = $pdo->prepare($sql);
    
    $query->bindValue(":id", $id, PDO::PARAM_INT);


    $query->execute();
    $animal = $query->fetch(PDO::FETCH_ASSOC);

    return $animal;
}