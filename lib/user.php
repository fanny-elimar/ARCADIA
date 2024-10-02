<?php

function verifyUserLoginPassword(PDO $pdo, string $email, string $password) {
    $query = $pdo->prepare("SELECT * FROM arc_user WHERE us_email = :email");
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if ($user && password_verify($password, $user['us_password'])) {
        return $user;
    } else {
        return false;
    }
}

function getUsers(PDO $pdo, int $limit = null, int $offset = null) {
    $query = $pdo->prepare("SELECT * FROM arc_user ORDER BY us_fname ASC");
    
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

function deleteUser(PDO $pdo, $id) {
    $query = $pdo->prepare("DELETE FROM arc_user WHERE us_id=:us_id;");
    $query->bindValue(':us_id', $id, PDO::PARAM_INT);
    return $query->execute();
}

function addUser(PDO $pdo, string $us_fname, string $us_email, string $us_password, string $us_password_check, string $us_role) :array|bool {
    if ($us_password == $us_password_check) {
        $sql = "INSERT INTO arc_user(us_fname, us_email, us_password, us_role) VALUES (:us_fname, :us_email, :us_password, :us_role);";
    $password_hash = password_hash($us_password, PASSWORD_DEFAULT);
    $query = $pdo->prepare($sql);
    $query->bindParam(':us_fname', $us_fname, PDO::PARAM_STR);
    $query->bindParam(':us_email', $us_email, PDO::PARAM_STR);
    $query->bindParam(':us_password', $password_hash, PDO::PARAM_STR);
    $query->bindParam(':us_role', $us_role, PDO::PARAM_STR);
    $query->execute();
    $message = 'Le nouvel utilisateur a bien été crée.';
        return $message;
    } else {
        $message = 'Le mot de passe ne correspond pas.';
        return $message;
    }
    
}

function verifyUserExists(PDO $pdo, $us_email):array|bool
{
    $query = $pdo->prepare("SELECT * FROM arc_user WHERE us_email =:us_email");
    $query->bindValue(':us_email', $us_email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    return $user;
}