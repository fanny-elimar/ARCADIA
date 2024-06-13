<?php

function getReviews(PDO $pdo):array|bool
{
    $sql = "SELECT * FROM arc_review";

    $query = $pdo->prepare($sql);


    $query->execute();
    $reviews = $query->fetchAll(PDO::FETCH_ASSOC);

    return $reviews;
}