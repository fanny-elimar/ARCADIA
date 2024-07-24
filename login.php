<?php
require_once 'lib/config.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';
require_once 'templates/_header.php';

$errors = [];
$messages = [];

if (isset($_POST['loginUser'])) {
    $user = verifyUserLoginPassword($pdo, $_POST['us_email'], $_POST['us_password']);
    if ($user) {
        session_regenerate_id(true);
        $_SESSION['user'] = $user;
        if ($user['us_role'] === 'admin') {
            header('location: admin/index.php');
        } elseif ($user['us_role'] === 'vet') {
            header('location: index.php');
        }
        elseif ($user['us_role'] === 'employe') {
            header('location: index.php');
        }
        else {
            //header('location: index.php');
        }
    } else {
        $errors[] = 'Email ou mot de passe incorrect';
    }
} ?>

<h1>Login</h1>
<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success" role="alert">
        <?= $message; ?>
    </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php } ?>
<form method="POST">
    <div class="mb-3">
        <div class="mb-3">
            <label for="us_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="us_email" name="us_email">
        </div>
        <div class="mb-3">
            <label for="us_password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="us_password" name="us_password">
        </div>
        <input type="submit" name="loginUser" class="btn btn-primary" value="Se connecter">
    </div>
</form>

<?php require_once 'templates/_footer.php';?>