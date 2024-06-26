<?php
require_once "../lib/config.php";
require_once "../lib/user.php";
require_once "../lib/session.php";

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['us_role']!=='admin') {
        header("location: ../index.php");
    }
}
else {header("location: ../index.php");}

?>

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Just+Another+Hand&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/CSS/custom2.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Arcadia</title>
</head>

<header class="container container-flux border-bottom mb-5">
            <div class="d-flex flex-wrap align-items-end justify-content-between mt-3">
            <picture class="d-flex">
                <source srcset="../<?=_ASSETS_IMAGES_FOLDER_.'logo.png' ;?>" media="(max-width:780px)" alt="logo-arcadia" class="img-fluid img-logo">
                <img src="../<?=_ASSETS_IMAGES_FOLDER_.'logo2.png';?>" class="img-fluid img-logo">
            </picture>    
                <div class="text-end nav-item d-flex">

                            <img src="../<?=_ASSETS_ICONES_FOLDER_.'admin.png';?>" class="img-fluid img-icone">
     
                    <a href="logout.php" class="nav-link px-2">Déconnexion</a>


            </div>
            
                

                    

                
            </div>


            

            
        </header>
<body>
    <div class="container d-flex">

        <div class="d-flex flex-column flex-shrink-0 p-3 col-3"  style="background-color: a4d0a4";>
            <a href="/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                <span class="fs-4">Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                
                    <li class="nav-item"><a href="user.php" class="nav-link">Gestion des utilisateurs</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Horaires</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Habitats</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Animaux</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Comptes-rendus du vétérinaire</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Suivi des clics</a></li>
                
                    
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong><?= $_SESSION['user']['us_email']; ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="/logout.php">Déconnexion</a></li>
                </ul>
            </div>
        </div>
        <main class="d-flex flex-column px-4 col-9" style="">

