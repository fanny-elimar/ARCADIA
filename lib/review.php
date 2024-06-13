<?php

function getReviews(PDO $pdo):array|bool
{
    $sql = "SELECT * FROM arc_review";

    $query = $pdo->prepare($sql);


    $query->execute();
    $reviews = $query->fetchAll(PDO::FETCH_ASSOC);

    return $reviews;
}

function addReview(PDO $pdo, string $re_pseudo, string $re_review) {
    $sql = "INSERT INTO arc_review (re_pseudo, re_review, re_approved) VALUES (:re_pseudo, :re_review, 'false');";
    $query = $pdo->prepare($sql);

    $query->bindParam(':re_pseudo', $re_pseudo, PDO::PARAM_STR);
    $query->bindParam(':re_review', $re_review, PDO::PARAM_STR);

    
    return $query->execute();
}