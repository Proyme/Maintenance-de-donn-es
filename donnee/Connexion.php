<?php

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

?>