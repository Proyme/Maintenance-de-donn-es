<?php

class Train
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'nom' => FILTER_FLAG_STRIP_HIGH,
			'vitesse' => FILTER_FLAG_STRIP_HIGH,
			'couleur' => FILTER_FLAG_STRIP_HIGH,
			'description' => FILTER_FLAG_STRIP_HIGH,
		);
		
	protected $nom;
	protected $vitesse;
	protected $couleur;
	protected $description;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Train::$filtres);

		$this->id = $tableau['id'];
		$this->nom = $tableau['nom'];
		$this->vitesse = $tableau['vitesse'];
		$this->couleur = $tableau['couleur'];
		$this->description = $tableau['description'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
            case 'description':
				$this->description = $valeur;
			break;
			case 'nom':
				$this->nom = $valeur;
			break;
			case 'vitesse':
				$this->vitesse = $valeur;
			break;
			case 'couleur':
				$this->couleur = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		//$variable = '$this->'.$propriete;
		//return $$variable;
		$self = get_object_vars($this); // externaliser pour optimiser
		//print_r($self);
		return $self[$propriete];
	}	
}
//$contrat = new Contrat();
//$contrat->nom = "coucou";
//echo $contrat->nom;
?>