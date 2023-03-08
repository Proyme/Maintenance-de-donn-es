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

  <div class="containerPrincipale">

      <div class="containerInfos">
        <h2 id="lst-nom"><?= $train->nom ?></h2>
        <p class="mb-0" id="lst-vitesse"><?= $train->vitesse ?></p>
        <p class="mb-0" id="lst-couleur"><?= $train->couleur ?></p>
        <p class="mb-0" id="lst-description"><?= $train->description ?></p>
  </div>

  </div>
</body>
</html>