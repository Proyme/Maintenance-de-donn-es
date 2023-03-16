<?php
interface TrainSQL
{
        public const SQL_LISTE_TRAINS = "SELECT * FROM trains";
		public const SQL_DETAIL_TRAINS = "SELECT * FROM trains WHERE id = :id";
        public const SQL_AJOUTER_TRAINS = "INSERT into trains(nom, description, vitesse, couleur) VALUES(:nom, :description, :vitesse, :couleur)";
		public const SQL_EDITER_TRAINS = "UPDATE trains SET nom = :nom, description = :description, vitesse = :vitesse, couleur = :couleur WHERE id = :id";
		public const SQL_EFFACER_TRAINS = "DELETE FROM trains WHERE id = :id";
}