<?php
if (getenv('alwaysdata') !== false) {
    $domain = '';
    $hostname = getenv('DB_HOST');
    $username = getenv('DB_USER');
    $password = getenv('DB_MDP');
    $database = getenv('DB_NAME');
} else {
    $domain = 'localhost';
    $hostname = 'localhost';
    $username = 'user';
    $password = 'arcadiamdp';
    $database = 'arcadiadb';
}

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