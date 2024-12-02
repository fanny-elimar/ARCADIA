<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/user.php";
require_once __DIR__ . "/../lib/session.php";

$url_array = explode('/',$_SERVER['PHP_SELF']);
$url = end($url_array);
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Présentation du zoo Arcadia">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Just+Another+Hand&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="assets/CSS/custom6.css">
            
            <title>Zoo Arcadia, parc animalier en Bretagne</title>
        </head>
        <body>
            <div class="container-lg">
                <header class="">
                    <div class="d-flex flex-wrap align-items-end justify-content-between mt-3">
                        <picture class="d-flex">
                            <source srcset="<?=_ASSETS_IMAGES_FOLDER_.'logo.png' ;?>" media="(max-width:780px)" alt="logo-arcadia-small" class="img-fluid img-logo">
                            <img src="<?=_ASSETS_IMAGES_FOLDER_.'logo2.png';?>" class="img-fluid img-logo" alt="logo-arcadia-wide" >
                        </picture>    
                        <div class="text-end nav-item d-flex">
                            <?php if (isset($_SESSION['user'])) {
                                if ($_SESSION['user']['us_role']==='vet') {?>
                                    <img src="<?=_ASSETS_ICONES_FOLDER_.'vet.png';?>" class="img-fluid img-icone" alt="icone-loggedin-vet">
                                <?php ;} elseif ($_SESSION['user']['us_role']==='admin') { ?>
                                    <img src="<?=_ASSETS_ICONES_FOLDER_.'admin.png';?>" class="img-fluid img-icone" alt="icone-loggedin-admin">
                                <?php ;} elseif ($_SESSION['user']['us_role']==='employe') { ?>
                                    <img src="<?=_ASSETS_ICONES_FOLDER_.'employe.png';?>" class="img-fluid img-icone" alt="icone-loggedin-employee">
                                <?php ;}?> 
                                <a href="logout.php" class="nav-link px-2">Déconnexion</a> 
                            <?php ;} else { ?>
                                <a href="login.php" class="nav-link px-2">Connexion</a> 
                            <?php ;} ?>
                        </div>
                    </div>
                    <div class="<?php if (isset($_SESSION['user']) && $_SESSION['user']['us_role']==='vet') {echo 'd-none d-md-flex';} else {echo 'd-flex';}?> flex-wrap justify-content-around pb-1 pt-1 ">
                        <img src="<?=_ASSETS_IMAGES_FOLDER_."jo1.webp";?>" class="header_img img-fluid" alt="photo-singe-Jo">    
                        <img src="<?=_ASSETS_IMAGES_FOLDER_."spatule blanche 2.webp";?>" class="header_img big img-fluid" alt="photo-spatule_blanche">
                        <img src="<?=_ASSETS_IMAGES_FOLDER_."zebras-4258909_1280.webp";?>" class="header_img medium img-fluid" alt="photo-zèbre">
                    </div>
                    <nav class="navbar navbar-expand-md">
                        <div class="container">
                            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#n_bar" aria-controls="navbarNavAltMarkup" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-center" id="n_bar">
                                <ul class="nav justify-content-around border-bottom ">
                                    <li class="nav-item">
                                        <a href="index.php"  class="nav-link px-2 <?php if(str_contains($url,'index')){?>active <?php } ?>">Accueil</a>
                                    </li>                
                                    <li class="nav-item">    
                                        <a href="services.php" class="nav-link px-2 <?php if(str_contains($url,'service')){?>active <?php } ?>">Services & horaires</a>
                                    </li>
                                    <li class="nav-item">    
                                        <a href="habitats.php" class="nav-link px-2 <?php if(str_contains($url,'habitat') || str_contains($url,'animal')){?>active <?php } ?>">Les habitats</a>
                                    </li>
                                    <li class="nav-item">    
                                        <a href="contact.php" class="nav-link px-2 <?php if(str_contains($url,'contact')){?>active <?php } ?>">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <main>
