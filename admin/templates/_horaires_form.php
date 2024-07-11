<form method="POST">
    <?php $x++; ?>
        <div class="mb-5 p-3 border">
        <div class="form-group row mb-3">
        <p class="col-sm-12 col-md-1 mb-1"> Du </p>    
        <input type="date" class="form-control col mb-3" id="periode<?=$x;?>_start" name="periode<?=$x;?>_start" value="<?=$_POST['periode'.$x.'_start'];?>">
        <p class="col-sm-12 col-md-1 mb-1"> au </p>    
        <input type="date" class="form-control col mb-3" id="periode<?=$x;?>_end" name="periode<?=$x;?>_end">
        </div>
        <div class="form-group row  mb-3">
        <p class="col-sm-12 col-md-1 mb-1"> Les </p>    
        <input type="text" class="form-control col mb-3" id="periode<?=$x;?>_days" name="periode<?=$x;?>_days">
        </div>
        <div class="form-group row  mb-3">
        <p class="col-sm-12 col-md-1 mb-1"> De </p>    
        <input type="time" class="form-control col mb-3" id="time<?=$x;?>_start" name="time<?=$x;?>_start">
        <p class="col-sm-12 col-md-1 mb-1"> à </p>    
        <input type="time" class="form-control col mb-3" id="time<?=$x;?>_end" name="time<?=$x;?>_end">
        </div>
        </div>
        <a class="btn btn-primary btn-sm js-button-add-horaires" data-bs-toggle="collapse" href="#collapseAddHoraires<?=$x;?>" role="button" aria-expanded="false" aria-controls="collapseExample" id="bouton-add-horaires<?=$x;?>">
    Ajouter
  </a>
    
    </form>