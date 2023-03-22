<?php
include_once "/var/www/html/ApplicationTrains/donnee/Train.php";
$reception = filter_var($_POST['id'], FILTER_VALIDATE_INT);

print_r($reception);

include_once "/var/www/html/ApplicationTrains/donnee/TrainDAO.php";
$train = TrainDAO::detaillerTrain($reception);

?>

<!DOCTYPE html>
<html>
<header>

  <?php include '../ApplicationTrains/layout/header.php' ?>

  <title>Accueil</title>

  <link rel="stylesheet" href="pageSupprimer.css">

</header>

<body>

  <br><br><br><br>
  <form action="/ApplicationTrains/traitementSupprimer.php" method="post">
  <div class="formulaire">
    <div>
        <div class="form-group item-formulaire" style="display: flex; justify-content: center;">
            <label class="col-form-label mt-4" for="inputDefault">Êtes vous sûr de vouloir supprimer cette article ?</label>
        </div>
          
    </div>
  </div>
  <br><br>

  <div class="centrer" style="display: flex; justify-content: center;">
    <input type="hidden" name="train" value="<?=formater($train->id)?>"/>
    <button type="button submit" class="btn btn-success" style="margin-right: 25px;" name="action-effacer" value="Oui" >Confirmer la suppression</button></a>
    <button type="button submit" class="btn btn-danger" name="action-annuler" value="Non">Annuler la suppression</button>
  </div>

  </form>
    
  <br><br><br>
  

</body>

</html>