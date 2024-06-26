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