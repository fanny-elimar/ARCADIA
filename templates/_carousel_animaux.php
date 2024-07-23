<!--Carousel des animaux-->
<?php  $list = opendir(_ANIMALS_IMAGES_FOLDER_);
  
  $tabfile = array();
  
  while ($fichier = readdir($list)) 
  {
  ($fichier != "." && $fichier != ".." && $fichier != ".htaccess")? $tabfile[] = $fichier : '' ;
  }
  closedir($list);

//mélange du tableau
  shuffle($tabfile);
?>

<!-- Carrousel pour écrans larges-->
<div id="carousel-animal-lg" class="carousel slide carousel-fade d-none d-lg-flex" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                  <div class="carousel-item active" data-interval="4000">
                    <div class="row ">
                    <?php for ($i=1;$i<=3;$i++) {?>
                      <div class="col-lg-4"><img src="<?= _ANIMALS_IMAGES_FOLDER_. $tabfile[$i];?>" alt="Carrousel slide 1" class="img-fluid h-100 bg-light" ></div>
                  <?php 

                }?>
                    </div>
                  </div>
                  <div class="carousel-item" data-interval="2000">
                  <div class="row d-flex justify-content-around">
                  <?php for ($i=4;$i<=6;$i++) {?>
                      <div class="col-lg-4"><img src="<?= _ANIMALS_IMAGES_FOLDER_. $tabfile[$i];?>" alt="Carrousel slide 1" class="d-block img-fluid h-100" ></div>
                  <?php }?>
                    </div>
                  </div>
                  <div class="carousel-item" data-interval="2000">
                  <div class="row d-flex justify-content-around">
                  <?php for ($i=7;$i<=9;$i++) {?>
                      <div class="col-lg-4"><img src="<?= _ANIMALS_IMAGES_FOLDER_. $tabfile[$i];?>" alt="Carrousel slide 1" class="d-block img-fluid h-100" ></div>
                  <?php }?>
                    </div>
                  </div>
                   </div>
                        <a class="carousel-control-prev" href="#carousel-animal-lg" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carousel-animal-lg" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
              </div>
        
        
            <!-- Carrousel pour écrans medium-->
            <div id="carousel-animal-md" class="carousel slide carousel-fade d-none d-md-flex d-lg-none" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                  <div class="carousel-item active" data-interval="4000">
                    <div class="row d-flex justify-content-around align-item-center">
        
                    <?php for ($i=1;$i<=2;$i++) {?>
                      <div class="col-11 col-md-6 col-lg-4"><img src="<?= _ANIMALS_IMAGES_FOLDER_. $tabfile[$i];?>" alt="Carrousel slide 1" class="d-block img-fluid h-100" ></div>
                  <?php }?>
                    </div>
                  </div>
                    <div class="carousel-item" data-interval="2000">
                    <div class="row d-flex justify-content-around align-item-center">
                    <?php for ($i=3;$i<=4;$i++) {?>
                      <div class="col-11 col-md-6 col-lg-4"><img src="<?= _ANIMALS_IMAGES_FOLDER_. $tabfile[$i];?>" alt="Carrousel slide 1" class="d-block img-fluid h-100" ></div>
                  <?php }?>
                        </div>
                        </div>
                         <div class="carousel-item" data-interval="2000">
                         <div class="row d-flex justify-content-around align-item-center">
                         <?php for ($i=5;$i<=6;$i++) {?>
                      <div class="col-11 col-md-6 col-lg-4"><img src="<?= _ANIMALS_IMAGES_FOLDER_. $tabfile[$i];?>" alt="Carrousel slide 1" class="d-block img-fluid h-100" ></div>
                  <?php }?>
                        </div>
                  </div>
                  <div class="carousel-item" data-interval="2000">
                         <div class="row d-flex justify-content-around align-item-center">
                         <?php for ($i=7;$i<=8;$i++) {?>
                      <div class="col-11 col-md-6 col-lg-4"><img src="<?= _ANIMALS_IMAGES_FOLDER_. $tabfile[$i];?>" alt="Carrousel slide 1" class="d-block img-fluid h-100" ></div>
                  <?php }?>
                        </div>
                  </div>
                   </div>
                        <a class="carousel-control-prev" href="#carousel-animal-md" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carousel-animal-md" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
              </div>
        
              <!-- Carrousel pour écrans small-->
              <div id="carousel-animal-sm" class="carousel slide carousel-fade d-md-none" data-bs-ride="carousel">
                      
                <div class="carousel-inner">
                  <div class="carousel-item active" data-interval="4000">
                    <div class="row d-flex justify-content-around align-item-center">
                        <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $tabfile[1];?>" alt="Carrousel slide 1" class="d-block img-fluid  h-100 object-fit-contain" ></div>
                    </div></div>
                    <?php for ($i=2;$i<=9;$i++) {?>
                      <div class="carousel-item " data-interval="2000">
                    <div class="row d-flex justify-content-around align-item-center">
                        <div class="col-11"><img src="<?=_ANIMALS_IMAGES_FOLDER_. $tabfile[$i];?>" alt="Carrousel slide 1" class="d-block img-fluid  h-100 object-fit-contain" ></div>
                    </div></div>
                  <?php }?>
                    
        
                   </div>
                        <a class="carousel-control-prev" href="#carousel-animal-sm" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carousel-animal-sm" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
              </div>