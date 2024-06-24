<?php

try
{
    $pdo = new PDO("pgsql:dbname="._DB_NAME_." options='--client_encoding=UTF8';host="._DB_SERVER_.";", _DB_USER_, _DB_PASSWORD_);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}