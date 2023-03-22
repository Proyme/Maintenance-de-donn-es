<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', true);
?>

<!DOCTYPE HTML>
<html>
  <?php include '/var/www/html/ApplicationTrains/layout/header.php' ?>
<head>
  <title>Liste des Trains "thomas"</title>
  <script src="/var/www/html/ApplicationTrains/donnee/TrainDAO.php"></script>
  <script src="../ApplicationTrains/Decoration/index.css"></script>

</head>
<body>

  <?php
    include "/var/www/html/ApplicationTrains/donnee/TrainDAO.php";
    $trains = TrainDAO::listerTrains();

    $iteration = 0;
      foreach($trains as $train)
      {
        if($iteration == 0){
          ?><div class="boxDeTrains" style=" display:flex; flex-direction:row; margin-left:5px; margin-right:5px;"><?php
          $iteration = $iteration + 1;
        }
        if($iteration <= 3){
          ?>
          <div style="width: 100%;">
          
            <div class="card border-warning mb-3" style="max-width: 20rem;">
              <div class="card-header">trains #<?= $train->id ?></div>
              <div class="card-body">
                <h4 class="card-title"><?= $train->nom ?></h4>
                <form action="listeDetailTrain.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $train->id ?>"/>
                    <button type="submit" class="btn btn-secondary">En savoir plus</button>
                </form>
                <form action="=supprimer.php" method="post">
                  <input type="hidden" name="id" id="id" value="<?= $train->id ?>"/>
                    <button type="submit" class="btn btn-danger">supprimer</button>
                </form>
              </div>
            </div>
          </div>
      <?php
      $iteration = $iteration + 1;
        } else {
          ?>
          </div>
          <div class="boxDeTrains">
            <div style="width: 100%;">
              <div class="card border-warning mb-3" style="max-width: 20rem;">
                <div class="card-header">trains #<?= $train->id ?></div>
                  <div class="card-body">
                    <h4 class="card-title"><?= $train->nom ?></h4>
                    <p class="card-text"><?= $train->vitesse ?></p>
                    <p class="card-text"><?= $train->couleur ?></p>
                    <form action="listeDetailTrain.php" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $train->id ?>"/>
                        <button type="submit" class="btn btn-secondary">En savoir plus</button>
                    </form>
                    <form action="supprimer.php" method="post">
                      <input type="hidden" name="id" id="id" value="<?= $train->id ?>"/>
                        <button type="submit" class="btn btn-danger">supprimer</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          $iteration = 1;
        }
      }
  ?>

<form action="ajouter.php" >
  <div class="centrer">
    <button type="submit" class="btn btn-success">Ajouter</button>
  </div>
</form>

</body>
</html>
