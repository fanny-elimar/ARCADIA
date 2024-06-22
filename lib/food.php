<?php 
function getFoods(PDO $pdo):array|bool
{
    $sql = "SELECT * FROM arc_food";
    
    $query = $pdo->prepare($sql);
    
    $query->execute();

    $foods = $query->fetchAll(PDO::FETCH_ASSOC);

        return $foods;
}

function getFoodInstructionById(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM arc_instruction WHERE in_id=:in_id";
    
    $query = $pdo->prepare($sql);
    $query->bindValue('in_id',$id,pdo::PARAM_INT);
    
    $query->execute();

    $foodInstruction = $query->fetch(PDO::FETCH_ASSOC);

        return $foodInstruction;
}

function deleteFoodInstruction(PDO $pdo, int $id):array|bool
{
    $sql = "DELETE FROM arc_instruction WHERE in_id=:in_id";
    
    $query = $pdo->prepare($sql);
    $query->bindValue(':in_id',$id,pdo::PARAM_INT);
    
    return $query->execute();

}

function addFoodInstruction (PDO $pdo, $an_id, $in_fo_id, $in_quantity) {
    $sql = "INSERT INTO arc_instruction (in_an_id, in_fo_id, in_quantity) VALUES (:in_an_id, :in_fo_id, :in_quantity);";
    $query = $pdo->prepare($sql);

    $query->bindParam(':in_an_id', $an_id, PDO::PARAM_INT);
    $query->bindParam(':in_fo_id', $in_fo_id, PDO::PARAM_INT);
    $query->bindParam(':in_quantity', $in_quantity, PDO::PARAM_INT);
    
    return $query->execute();

}

function getFoodInstructionByAnimalId(PDO $pdo, $an_id):array|bool
{
    $sql = "SELECT fo_type, in_quantity, in_id FROM arc_food INNER JOIN arc_instruction on arc_food.fo_id = arc_instruction.in_fo_id WHERE in_an_id=:in_an_id";
    
    $query = $pdo->prepare($sql);

    $query->bindValue('in_an_id',$an_id, PDO::PARAM_INT);
    
    $query->execute();

    $foodInstruction = $query->fetchAll(PDO::FETCH_ASSOC);

        return $foodInstruction;
}