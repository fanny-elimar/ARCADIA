<?php

require_once __DIR__ . "/templates/_header.php";
?>

<div>
    <p>Situé en Bretagne, près de la forêt de Brocéliande, Arcadia est un lieu de découverte de la biodiversité mondiale. Au fil de votre visite, vous découvrirez des <a href="habitats.php" class="link-text">habitats</a> variés et la faune   qui y vit.</p>
</div>

<div class="bandeau-habitats d-flex justify-content-center">

<?php
require __DIR__ . "/templates/_habitat_card.php";
require __DIR__ . "/templates/_habitat_card.php";
require __DIR__ . "/templates/_habitat_card.php";
?>

</div>
<div>
    <p>
        En venant à Arcadia, vous aurez le plaisir de rencontrer de nombreux animaux : girafes,  éléphants,  hippopotames,  singes,  serpents,  tortues et bien d'autres encore.
    </p>
</div>


<?php require_once __DIR__ . "/templates/_footer.php"; ?>