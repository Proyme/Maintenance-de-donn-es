<!DOCTYPE html>
<html>
<header>

  <title>Page Liste Detailee</title>

  <link rel="stylesheet" href="_Layout/_ListeDetaillee.css">

  <link rel="stylesheet" href="_Layout/bootstrap.min.css">
  
  <?php include '/var/www/html/ApplicationTrains/layout/header.php' ?>

</header>

<body>

<?php
  require('/var/www/html/ApplicationTrains/donnee/TrainDAO.php');
  $reception = filter_var($_POST['id'], FILTER_VALIDATE_INT);
  //print_r($reception);
  $train = TrainDAO::detaillerTrain($reception);

  $AcutalId = $train->id;
?>
  <script>
    window.onload = function(){
      setId(<?=$AcutalId?>);
    };
  </script>

  <div class="containerPrincipale" style="display:flex; justify-content:center;">

      <div class="containerInfos">
        <h2 id="lst-nom"><?= $train->nom ?></h2>
        <h6 style="color:aquamarine;">Vitesse</h6>
        <p class="mb-0" id="lst-vitesse"><?= $train->vitesse ?> km/h</p>
        <h6 style="color:aquamarine;">Couleur</h6>
        <p class="mb-0" id="lst-couleur"><?= $train->couleur ?></p>
        <h6 style="color:aquamarine;">Description</h6>
        <p class="mb-0" id="lst-description"><?= $train->description ?></p>

        <form>
          <button type="submit" formaction="/ApplicationTrains/index.php" style="margin-top: 3%;" class="btn btn-info">Retour au menu</button>
        </form>
  </div>

  </div>
</body>
</html>