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

		public static function ajouterTrain($train)
		{
			TrainDAO::initialiser();
			//echo $SQL_AJOUTER_TRAIN;
			$demandeAjoutTrain = TrainDAO::$basededonnees->prepare(TrainDAO::SQL_AJOUTER_TRAINS);
			$demandeAjoutTrain->bindValue(':nom',$train->nom, PDO::PARAM_STR);
			$demandeAjoutTrain->bindValue(':description',$train->description, PDO::PARAM_STR);
			$demandeAjoutTrain->bindValue(':vitesse',$train->vitesse, PDO::PARAM_STR);
			$demandeAjoutTrain->bindValue(':couleur',$train->couleur, PDO::PARAM_STR);
			$demandeAjoutTrain->execute();			
		}
		
		public static function editerTrain($train)
		{
			//print_r($projet);
			TrainDAO::initialiser();

			//echo $SQL_EDITER_PROJET;
			$demandeEditionTrain = TrainDAO::$basededonnees->prepare(TrainDAO::SQL_EDITER_TRAINS);
			$demandeEditionTrain->bindValue(':nom',$train->nom, PDO::PARAM_STR);
			$demandeEditionTrain->bindValue(':description',$train->description, PDO::PARAM_STR);
			$demandeEditionTrain->bindValue(':vitesse',$train->vitesse, PDO::PARAM_STR);
			$demandeEditionTrain->bindValue(':couleur',$train->couleur, PDO::PARAM_STR);
			print_r($train);

			$demandeEditionTrain->execute();
		}
		
		public static function effacerTrain($id)
		{
			TrainDAO::initialiser();

			//echo $SQL_EFFACER_TRAIN;
			$demandeEffacementTrain = TrainDAO::$basededonnees->prepare(TrainDAO::SQL_EFFACER_TRAINS);
			$demandeEffacementTrain->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeEffacementTrain->execute();
		}
		
	}

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}