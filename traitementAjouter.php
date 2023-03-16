<?php 
    print_r($_POST);

    include_once("/var/www/html/ApplicationTrains/donnee/TrainDAO.php");
    include_once("/var/www/html/ApplicationTrains/donnee/Train.php");
	
	$train = new Train($_POST);
	
	TrainDAO::ajouterTrain($train);

    header('Location: http://51.79.51.106/ApplicationTrains/');
    exit;
?>