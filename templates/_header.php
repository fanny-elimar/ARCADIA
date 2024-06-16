<?php
require_once __DIR__ . "/../lib/config.php";
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

    <link rel="stylesheet" href="assets/CSS/custom1.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Arcadia</title>
</head>

<body>
    <div class="container">
        <header class="">
            <div class="d-flex flex-wrap align-items-end justify-content-between mt-3">
            <picture class="d-flex">
                <source srcset="<?=_ASSETS_IMAGES_FOLDER_.'logo.png' ;?>" media="(max-width:780px)" alt="logo-arcadia" class="img-fluid img-logo">
                <img src="<?=_ASSETS_IMAGES_FOLDER_.'logo2.png';?>" class="img-fluid img-logo">
            </picture>    
                <div class="text-end nav-item">
                <a href="/index.php?controller=auth&action=login" class="nav-link px-2">Connexion</a>
            </div>
            
                

                    

                
            </div>
              
            <div class="d-flex flex-wrap justify-content-around pb-1 pt-1 ">
            <img src="<?=_ASSETS_IMAGES_FOLDER_."pandas roux.webp";?>" class="header_img">    
            <img src="<?=_ASSETS_IMAGES_FOLDER_."flamingos-6945385_1280.webp";?>" class="header_img big">
            <img src="<?=_ASSETS_IMAGES_FOLDER_."zebras-4258909_1280.webp";?>" class="header_img medium">
            </div>

            <nav class="navbar navbar-expand-sm">
            <div class="container">
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#n_bar" aria-controls="navbarNavAltMarkup" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="n_bar">
        
                <ul class="nav justify-content-around border-bottom ">
                <li class="nav-item">
                    <a href="index.php" class="nav-link px-2">Accueil</a>
                </li>                
                <li class="nav-item">    
                    <a href="services.php" class="nav-link px-2">Les services</a>
                </li>
                <li class="nav-item">    
                    <a href="habitats.php" class="nav-link px-2">Les habitats</a>
                </li>
                <li class="nav-item">    
                    <a href="contact.php" class="nav-link px-2">Contact</a>
                </li>

            </ul>
                </div>
            </div>
            </nav>

            
        </header>

        <main>
