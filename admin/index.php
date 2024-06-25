<?php
require_once __DIR__ . '\templates/_header.php';

if ($_SESSION['user']['us_role']!=='admin') {
    header("location: ../index.php");
} else {}

?>

<div class="px-4 py-5 my-5 text-left">
  <h1 class="display-5 fw-bold text-body-emphasis">Admin Les écrits de papy</h1>
  <div class="col-lg-12">
    <p class="lead mb-4">Gestion du site Les écrits de papy pour administrer les articles.</p>
  </div>
</div>

<?php
require_once '../templates/_footer.php'
?>