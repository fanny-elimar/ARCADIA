<?php

try
{
    $pdo = new PDO("pgsql:dbname="._DB_NAME_." options='--client_encoding=UTF8';host="._DB_SERVER_.";", _DB_USER_, _DB_PASSWORD_);
// Définir le mode d'erreur de PDO pour lancer des exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    if (getenv('alwaysdata') !== false) {
        // Retourner un message générique à l'utilisateur
    echo "Impossible de se connecter à la base de données. Veuillez réessayer plus tard.";
    exit; // Arrêter le script après l'erreur
        
    } else {
        // Loguer l'erreur dans un fichier de log
        $logMessage = date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . "\n";
    error_log($logMessage, 3, 'logs/arcadia_database_errors.log');

            // Retourner un message générique à l'utilisateur
            echo "Impossible de se connecter à la base de données. Veuillez réessayer plus tard.";
            exit; // Arrêter le script après l'erreur
    }
    
    
}