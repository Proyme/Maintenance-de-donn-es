<?php

  include_once "/var/www/html/ApplicationTrains/donnee/TrainSQL.php";
  include "/var/www/html/ApplicationTrains/donnee/Accesseur.php";

  class TrainDAO extends Accesseur implements TrainSQL
	{		
		public static function listerTrains()
		{
			TrainDAO::initialiser();
			$demandeProjets = TrainDAO::$basededonnees->prepare(TrainDAO::SQL_LISTE_TRAINS);
			$demandeProjets->execute();
			//$projets = $demandeProjets->fetchAll(PDO::FETCH_OBJ);
			$ProjetsTableau = $demandeProjets->fetchAll(PDO::FETCH_ASSOC);
			foreach($ProjetsTableau as $ProjetTableau) $projets[] = new Projet($ProjetTableau);
			return $projets;
		}
		
		public static function detaillerTrain($id)
		{
			TrainDAO::initialiser();
			$demandeProjet = TrainDAO::$basededonnees->prepare(TrainDAO::SQL_DETAIL_TRAINS);
			$demandeProjet->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeProjet->execute();
			//$projet = $demandeProjet->fetchAll(PDO::FETCH_OBJ)[0];
			$projet = $demandeProjet->fetch(PDO::FETCH_ASSOC);
			return new Projet($projet);
		}
		
	}

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}

?>