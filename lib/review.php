<?php

function getApprovedReviews(PDO $pdo, int $limit = null, int $offset = null):array|bool
{
    $sql = "SELECT * FROM arc_review WHERE re_approved = true ORDER BY re_date DESC";
    if ($limit && !$offset) {
        $sql .= " LIMIT  :limit";}

        if ($limit && $offset) {
            $sql .= " LIMIT  :limit OFFSET :offset";}

    $query = $pdo->prepare($sql);
    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }

    if ($offset) {
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

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

function getNumberOfApprovedReviews(PDO $pdo) {
    $sql = "SELECT COUNT(*) AS total FROM arc_review WHERE re_approved = true;";
    $query = $pdo->prepare($sql);
    $query -> execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];

}

function getDraftReviews(PDO $pdo, int $limit = null, int $offset = null):array|bool
{
    $sql = "SELECT * FROM arc_review WHERE re_approved = false ORDER BY re_date DESC";
    if ($limit && !$offset) {
        $sql .= " LIMIT  :limit";}

        if ($limit && $offset) {
            $sql .= " LIMIT  :limit OFFSET :offset";}

    $query = $pdo->prepare($sql);
    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }

    if ($offset) {
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    $query->execute();
    $draftReviews = $query->fetchAll(PDO::FETCH_ASSOC);

    return $draftReviews;
}

function approveReview (PDO $pdo, $id) {
    $sql = "UPDATE arc_review SET re_approved = true WHERE re_id=:re_id;";
    $query = $pdo->prepare($sql);
    $query->bindValue(':re_id', $id, PDO::PARAM_INT);

    return $query->execute();
}

function deleteReview (PDO $pdo, $id) {
    $sql = "DELETE FROM arc_review WHERE re_id=:re_id;";
    $query = $pdo->prepare($sql);
    $query->bindValue(':re_id', $id, PDO::PARAM_INT);

    return $query->execute();
}