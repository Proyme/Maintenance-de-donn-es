<?php
include_once "/var/www/html/ApplicationTrains/donnee/Train.php";

include "/var/www/html/ApplicationTrains/donnee/TrainDAO.php";
?>

<!DOCTYPE html>
<html>
<header>

  <?php include '../ApplicationTrains/layout/header.php' ?>
 
  <title>Accueil</title>

  <link rel="stylesheet" href="pageAjouter.css">

</header>

<body>

  <form action="/ApplicationTrains/traitementAjouter.php" method="post">
    <div class="formulaire" action="trains.php" style="display: flex; flex-basis: 80%; justify-content: center; flex-direction: row;">
      <div>
          <input type="hidden" name="id" value="<?=formater($train->id)?>"/>
          <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Nom</label>
              <textarea class="form-control" rows="2" id="nom" name="nom" placeholder="Nom"></textarea>

            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Vitesse</label>
              <textarea class="form-control" rows="2" id="vitesse" name="vitesse" placeholder="Vitesse"></textarea>
            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Description</label>
              <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Couleur</label>
              <textarea class="form-control" rows="5" id="couleur" name="couleur" placeholder="Couleur"></textarea>
            </div>
      </div>
    </div>
    <br><br>
    <div class="centrer" style="display: flex; justify-content: center;">
      <button type="submit" class="btn btn-warning" style="margin-right: 60px; ">Ajouter</button>
      <button type="submit" formaction="/ApplicationTrains/index.php" class="btn btn-danger">Annuler</button>
    </div>
  </form>
  
  <br><br><br>

</body>

</html>