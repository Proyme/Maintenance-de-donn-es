<?php

  include_once "/var/www/html/ApplicationTrains/donnee/TrainSQL.php";
  include_once "/var/www/html/ApplicationTrains/donnee/Train.php";
  //include "/var/www/html/ApplicationTrains/donnee/Connexion.php";

  class Accesseur
  {
  
	  public static $basededonnees = null;
  
	  public static function initialiser()
	  {
		  error_reporting(E_ALL);
		  ini_set('display_errors', 1);
	  
		  $usager = 'root';
		  $motdepasse = 'julesalpha';
		  $hote = 'localhost';
		  $base = 'train';
		  //$charset = 'utf8mb4'; // $charset = 'utf8';
	  
		  $dsn = "mysql:host=$hote;dbname=$base;";
  
		  TrainDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
		  TrainDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  }
  }

  class TrainDAO extends Accesseur implements TrainSQL
	{		
		public static function listerTrains()
		{
			TrainDAO::initialiser();
			$demandeTrains = TrainDAO::$basededonnees->prepare(TrainDAO::SQL_LISTE_TRAINS);
			$demandeTrains->execute();
			//$trains = $demandeTrains->fetchAll(PDO::FETCH_OBJ);
			$TrainsTableau = $demandeTrains->fetchAll(PDO::FETCH_ASSOC);
			foreach($TrainsTableau as $TrainTableau) $trains[] = new Train($TrainTableau);
			return $trains;
		}
		
		public static function detaillerTrain($id)
		{
			TrainDAO::initialiser();
			$demandeTrain = TrainDAO::$basededonnees->prepare(TrainDAO::SQL_DETAIL_TRAINS);
			$demandeTrain->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeTrain->execute();
			//$train = $demandeTrain->fetchAll(PDO::FETCH_OBJ)[0];
			$train = $demandeTrain->fetch(PDO::FETCH_ASSOC);
			return new Train($train);
		}
		
	}

?>