<?php
if (getenv('alwaysdata') !== false) {
    $domain = '';
} else {
// Charger les variables depuis le fichier .env.local
loadEnv( 'C:\xampp\htdocs\ARCADIA\.env.local');
    $domain = 'localhost';
}

$hostname = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');

define("_DOMAIN_", $domain);
define("_DB_SERVER_", $hostname);
define("_DB_NAME_", $database);
define("_DB_USER_", $username);
define("_DB_PASSWORD_", $password);
define("_ASSETS_IMAGES_FOLDER_", "assets/images/");
define("_ASSETS_IMAGES_FOLDER_ADM", "../assets/images/");
define("_ASSETS_ICONES_FOLDER_", "assets/icones/");
define("_SERVICES_IMAGES_FOLDER_ADMIN_", "../uploads/services/");
define("_SERVICES_IMAGES_FOLDER_", "uploads/services/");
define("_HABITATS_IMAGES_FOLDER_ADMIN_", "../uploads/habitats/");
define("_HABITATS_IMAGES_FOLDER_", "uploads/habitats/");
define("_ANIMALS_IMAGES_FOLDER_ADMIN_", "../uploads/animals/");
define("_ANIMALS_IMAGES_FOLDER_", "uploads/animals/");
define("_REVIEWS_LIMIT_", 3);
define("_ADMIN_ITEM_PER_PAGE_", 10);

// Fonction pour charger les variables d'environnement depuis un fichier .env
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception("Le fichier .env n'existe pas à l'emplacement spécifié.");
    }

    // Lire le fichier .env
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Ignorer les lignes de commentaires et de retour à la ligne
        if (empty($line) || $line[0] === '#') {
            continue;
        }

        // Séparer la clé et la valeur
        list($key, $value) = explode('=', $line, 2);

        // Enlever les espaces autour de la clé et de la valeur
        $key = trim($key);
        $value = trim($value);

        // Définir la variable d'environnement
        putenv("{$key}={$value}");
       // echo ("{$key}={$value}");
    }
}