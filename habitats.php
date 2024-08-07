<?php

require_once __DIR__ . "/lib/config.php"; 
require_once __DIR__ . "/lib/pdo.php"; 
require_once __DIR__ . "/templates/_header.php";
require_once __DIR__ . "/lib/habitat.php"; 
?>

<h1>Les habitats</h1>
<p>Cliquez sur un habitat pour voir les animaux qui s'y trouvent.</p>
<div class="container">
  <div class="d-md-flex justify-content-center">
    <?php 
    $habitats = getHabitats($pdo);
    foreach ($habitats as $habitat) {
      require __DIR__ . "/templates/_habitat_card.php";
    } ?>
  </div>
</div>

<?php require_once __DIR__ . "/templates/_footer.php"; ?>