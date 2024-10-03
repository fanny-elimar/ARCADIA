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

function modifyFoodInstruction (PDO $pdo, $in_id, $in_fo_id, $in_quantity) {
    $sql = "UPDATE arc_instruction SET in_fo_id = :in_fo_id, in_quantity = :in_quantity  WHERE in_id = :in_id;";
    $query = $pdo->prepare($sql);

    $query->bindParam(':in_id', $in_id, PDO::PARAM_INT);
    $query->bindParam(':in_fo_id', $in_fo_id, PDO::PARAM_INT);
    $query->bindParam(':in_quantity', $in_quantity, PDO::PARAM_INT);
    
    return $query->execute();

}

function getFoodInstructionByAnimalId(PDO $pdo, $an_id):array|bool
{
    $sql = "SELECT fo_type, in_quantity, in_id, in_fo_id FROM arc_food INNER JOIN arc_instruction on arc_food.fo_id = arc_instruction.in_fo_id WHERE in_an_id=:in_an_id";
    
    $query = $pdo->prepare($sql);

    $query->bindValue('in_an_id',$an_id, PDO::PARAM_INT);
    
    $query->execute();

    $foodInstruction = $query->fetchAll(PDO::FETCH_ASSOC);

        return $foodInstruction;
}

function addFood(PDO $pdo, $fo_type) {
    $sql = "INSERT INTO arc_food (fo_type) VALUES (:fo_type);";
    $query = $pdo->prepare($sql);

    $query->bindValue(':fo_type', $fo_type, PDO::PARAM_INT);

    return $query->execute();
}

function addFoodGiven(PDO $pdo, $an_id, $fe_fo_id, $fe_quantity,  $fe_date, $fe_time) {
    $sql = "INSERT INTO arc_feeding (fe_an_id, fe_fo_id, fe_quantity, fe_date, fe_time) VALUES (:fe_an_id, :fe_fo_id, :fe_quantity, :fe_date, :fe_time);";
    $query = $pdo->prepare($sql);

    $query->bindParam(':fe_an_id', $an_id, PDO::PARAM_INT);
    $query->bindParam(':fe_fo_id', $fe_fo_id, PDO::PARAM_INT);
    $query->bindParam(':fe_quantity', $fe_quantity, PDO::PARAM_INT);
    $query->bindParam(':fe_date', $fe_date, PDO::PARAM_STR);
    $query->bindParam(':fe_time', $fe_time, PDO::PARAM_STR);

    return $query->execute();
}

function getFoodGivenByAnimalId(PDO $pdo, $an_id, $fe_date) {
    $sql = "SELECT fe_quantity, fe_date, fe_time, fo_type, fe_id FROM arc_feeding INNER JOIN arc_food on arc_feeding.fe_fo_id=arc_food.fo_id WHERE fe_an_id=:an_id AND fe_date = :fe_date;";
    $query = $pdo->prepare($sql);

    $query->bindParam(':an_id', $an_id, PDO::PARAM_INT);
    $query->bindParam(':fe_date', $fe_date, PDO::PARAM_INT);
    $query->execute();
    $foodGiven = $query->fetchAll(pdo::FETCH_ASSOC);
    return $foodGiven;
}

function deleteFoodGiven(PDO $pdo, int $id):array|bool
{
    $sql = "DELETE FROM arc_feeding WHERE fe_id=:fe_id;";
    
    $query = $pdo->prepare($sql);
    $query->bindValue(':fe_id',$id,pdo::PARAM_INT);
    
    return $query->execute();

}