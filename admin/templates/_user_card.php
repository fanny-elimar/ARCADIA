<div class="card m-1 light" style="width:15rem; height:8rem;" >
  <div class="card-body justify-content-center">
    <h6 class="card-title"><?= ucfirst(htmlentities($user["us_fname"]))?></h6>
    <p class="card-text"><?= ucfirst(htmlentities($user["us_email"]))?></p>
    <div class="row">
      <img class="img-fluid img-icone col-3" alt="icone-utilisateur" src="../assets/icones/<?php if ($user["us_role"]=='employe') {?>employe.png<?php ;} elseif ($user["us_role"]=='vet') {?>vet.png<?php ;} elseif ($user["us_role"]=='admin') {?>admin.png<?php ;} ?>">
      <div class="col">
        <form method='POST'>
          <button type="submit" name="<?php echo 'deleteUser'.$user['us_id'];?>" class="btn btn-primary btn-sm" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><img src="../assets/icones/delete.png" height="15" alt="icone-supprimer"></button>
        </form>
      </div>
    </div>
  </div>
</div>