<?php
require_once __DIR__ . '\templates/_header.php';

if ($_SESSION['user']['us_role']!=='admin') {
    header("location: ../index.php");
} else {}

?>

<div class="px-4 py-5 my-5 text-left" >
  <h1 class="display-5 ">Gestion du site Arcadia</h1>
</div>
</div>

<?php
require_once '../templates/_footer.php'
?>