<?php 
function getAnimalsByHabitat(PDO $pdo, int $ha_id, int $limit = null, int $offset = null):array|bool
{
    $sql = "SELECT * FROM arc_animal WHERE an_ha_id = :id ORDER BY an_id ASC";
    if ($limit && !$offset) {
        $sql .= " LIMIT  :limit";}

        if ($limit && $offset) {
            $sql .= " LIMIT  :limit OFFSET :offset";}


    $query = $pdo->prepare($sql);
    $query->bindValue(":id", $ha_id, PDO::PARAM_INT);
    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }

    if ($offset) {
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

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

function getHabitatByAnimalId(PDO $pdo, int $id)
{
    $sql = "SELECT ha_name, ha_id FROM arc_habitat, arc_animal WHERE an_id = :id";

    $query = $pdo->prepare($sql);
    
    $query->bindValue(":id", $id, PDO::PARAM_INT);


    $query->execute();
    $habitat = $query->fetch(PDO::FETCH_ASSOC);

    return $habitat;
}



function getNumberOfAnimalsPerHabitat(PDO $pdo, $habitat) {
    $sql = "SELECT COUNT(*) AS total FROM arc_animal WHERE an_ha_id = :an_ha_id;";
    $query = $pdo->prepare($sql);
    $query->bindValue(":an_ha_id", $habitat, PDO::PARAM_INT);
    $query -> execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];

}

function getEnclosureByAnimalId($pdo, $id) {
    $sql = "SELECT * FROM arc_enclosure INNER JOIN arc_animal on arc_animal.an_en_id = arc_enclosure.en_id WHERE an_id=:an_id;";
    $query = $pdo->prepare($sql);
    $query->bindValue(":an_id", $id, PDO::PARAM_INT);
    $query->execute();
    $enclosure = $query->fetch(PDO::FETCH_ASSOC);
    return $enclosure;
}

function addAnimal(PDO $pdo,string $an_name,string $an_species,string|null $an_images,int $an_ha_id,int $an_en_id, int $id = null):array|bool
{
    if ($id === null) {
        $sql1 = "INSERT INTO arc_animal (an_name, an_species, an_images, an_ha_id, an_en_id) VALUES (:an_name, :an_species, :an_images, :an_ha_id, :an_en_id);";
        $query=$pdo->prepare($sql1);
    } else {
        $sql2 = "UPDATE arc_animal SET an_name = :an_name, an_species = :an_species, an_images = :an_images, an_ha_id = :an_ha_id, an_en_id=:an_en_id WHERE an_id=:an_id;";
        $query=$pdo->prepare($sql2);
        $query->bindParam(':an_id', $id, PDO::PARAM_INT);
    }

    $query->bindParam(':an_name', $an_name, PDO::PARAM_STR);
    $query->bindParam(':an_species', $an_species, PDO::PARAM_STR);
    $query->bindParam(':an_images', $an_images, PDO::PARAM_STR);
    $query->bindParam(':an_ha_id', $an_ha_id, PDO::PARAM_INT);
    $query->bindParam(':an_en_id', $an_en_id, PDO::PARAM_INT);
    
        return $query->execute();
}

function deleteAnimal (PDO $pdo, int $id) {
    $query = $pdo->prepare("DELETE FROM arc_animal WHERE an_id=:an_id;");
    $query->bindValue(':an_id', $id, PDO::PARAM_INT);
    
    return $query->execute();
}