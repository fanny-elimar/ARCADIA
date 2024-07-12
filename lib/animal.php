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

function getImagesByAnimalId (PDO $pdo, int $id) {
    $sql = "SELECT * FROM arc_image_animal WHERE im_an_an_id = :id;";
    $query=$pdo->prepare ($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $images = $query -> fetchAll(PDO::FETCH_ASSOC);
    return $images; 
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
    $sql = "SELECT * FROM arc_enclosure INNER JOIN arc_animal on arc_animal.an_en_name = arc_enclosure.en_name WHERE an_id=:an_id;";
    $query = $pdo->prepare($sql);
    $query->bindValue(":an_id", $id, PDO::PARAM_INT);
    $query->execute();
    $enclosure = $query->fetch(PDO::FETCH_ASSOC);
    return $enclosure;
}

function addAnimal(PDO $pdo,string $an_name,string $an_species,string|null $an_images,int $an_ha_id,string $an_en_name, int $id = null):array|bool
{
    if ($id === null) {
        $sql1 = "INSERT INTO arc_animal (an_name, an_species, an_images, an_ha_id, an_en_name) VALUES (:an_name, :an_species, :an_images, :an_ha_id, :an_en_name);";
        $query=$pdo->prepare($sql1);
    } else {
        $sql2 = "UPDATE arc_animal SET an_name = :an_name, an_species = :an_species, an_images = :an_images, an_ha_id = :an_ha_id, an_en_name=:an_en_name WHERE an_id=:an_id;";
        $query=$pdo->prepare($sql2);
        $query->bindParam(':an_id', $id, PDO::PARAM_INT);
    }

    $query->bindParam(':an_name', $an_name, PDO::PARAM_STR);
    $query->bindParam(':an_species', $an_species, PDO::PARAM_STR);
    $query->bindParam(':an_images', $an_images, PDO::PARAM_STR);
    $query->bindParam(':an_ha_id', $an_ha_id, PDO::PARAM_INT);
    $query->bindParam(':an_en_name', $an_en_name, PDO::PARAM_STR);
    
        return $query->execute();
}

function deleteAnimal (PDO $pdo, int $id) {
    $query = $pdo->prepare("DELETE FROM arc_animal WHERE an_id=:an_id;");
    $query->bindValue(':an_id', $id, PDO::PARAM_INT);
    
    return $query->execute();
}

function addImage(PDO $pdo,string $im_an_filename,int $im_an_an_id = null):array|bool
{
   
        $sql1 = "INSERT INTO arc_image_animal (im_an_filename, im_an_an_id) VALUES (:im_an_filename, :im_an_an_id);";
        $query=$pdo->prepare($sql1);
   

    $query->bindParam(':im_an_filename', $im_an_filename, PDO::PARAM_STR);
    $query->bindParam(':im_an_an_id', $im_an_an_id, PDO::PARAM_INT);
    
    
        return $query->execute();
}

function deleteImage (PDO $pdo,string $im_an_id) {
    $sql = "DELETE FROM arc_image_animal WHERE im_an_id=:im_an_id;";
    $query = $pdo->prepare($sql);
    $query->bindValue(':im_an_id', $im_an_id, PDO::PARAM_STR);
    return $query->execute();
}

function verifyEnclosureExists (PDO $pdo, string $en_name) {
    $sql = "SELECT * FROM arc_enclosure WHERE en_name=:en_name;";
    $query = $pdo->prepare($sql);
    $query->bindValue(':en_name', $en_name, PDO::PARAM_STR);
    $query->execute();
    $enclosureExists = $query->fetch(PDO::FETCH_ASSOC);
    return $enclosureExists;
}

function addEnclosure (PDO $pdo, string $en_name) {
    $sql = "INSERT INTO arc_enclosure (en_name) VALUES (:en_name);";
    $query = $pdo->prepare($sql);
    $query->bindValue(':en_name', $en_name, PDO::PARAM_STR);
    return $query->execute();
}

function getExtraImagesByAnimalId($pdo, $id) {
    $sql = "SELECT im_an_an_id, im_an_filename, an_id FROM arc_image_animal INNER JOIN arc_animal on arc_animal.an_id = arc_image_animal.im_an_an_id WHERE an_id=:an_id;";
    $query = $pdo->prepare($sql);
    $query->bindValue(":an_id", $id, PDO::PARAM_INT);
    $query->execute();
    $extraImages = $query->fetchAll(PDO::FETCH_ASSOC);
    return $extraImages;
}