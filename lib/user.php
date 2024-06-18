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