<?php
    include_once "/var/www/html/ApplicationTrains/donnee/TrainDAO.php";

    $id = $_POST['train'];
    print_r("id: ");
    print_r($id);
    $valeurAction = $_POST['action-effacer'];
    $URL = "http://51.79.51.106/ApplicationTrains/index.php";

    if($valeurAction == "Oui")
    {
        //print_r("C'est un oui");
        TrainDAO::effacerTrain($id);
        header('Location: http://51.79.51.106/ApplicationTrains/index.php') ;

    }
    else{
        //print_r("C'est un non");
        header('Location: http://51.79.51.106/ApplicationTrains/index.php') ;
    }

?>