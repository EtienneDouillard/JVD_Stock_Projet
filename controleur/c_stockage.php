<?php

if(!isset($_REQUEST['action'])){

    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

switch($action){

    case 'afficherformstockage':{

        include("vues/v_stockage.php");

        break;
    }
    case 'stocke':{
        $reference = $_POST['reference'];
        $numero = $_POST['numero'];
        $emplacement = $_POST['emplacement'];
        $quantite = $_POST['quantite'];
        
        $stockage = $pdo->stockage($reference,$numero,$emplacement,$quantite);

        include("vues/v_stockage.php");
        
        break;
    }
}    
?>