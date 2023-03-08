<?php

interface Accesseur
{
    public static $basededonnees = null;


    //include_once "../Donnee/connexion.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $usager = 'root';
    $motdepasse = 'julesalpha';
    $hote = 'localhost';
    $base = 'train';
    //$charset = 'utf8mb4'; // $charset = 'utf8';

    $dsn = "mysql:host=$hote;dbname=$base;";

    ProjetDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
    ProjetDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
?>