<?php

require_once __DIR__ . "/lib/config.php"; 
require_once __DIR__ . "/lib/pdo.php"; 
require_once __DIR__ . "/templates/_header.php";
require_once __DIR__ . "/lib/service.php"; 

?>


<h1>Les services</h1>
<p>Pour rendre votre visite encore plus agréable, des services supplémentaires sont disponibles.</p>

<div d-inline>
  <div class="bandeau-habitats justify-content-center">

<?php 
$services = getServices($pdo);

foreach ($services as $service) {
        require __DIR__ . "/templates/_service_card.php";
    } ?>

  </div>
  
</div>

<?php require_once __DIR__ . "/templates/_footer.php"; ?>