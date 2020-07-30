<?php

if(!isset($_REQUEST['action'])){

    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

switch($action){

    case 'afficherFormStockage':{

        include("./vues/v_stockage.php");

        break;
    }
    case 'stocke':{
        $reference = $_POST['reference'];
        $emplacement = $_POST['emplacement'];
        $quantite = $_POST['quantite'];
        
        $stockage = $pdo->stockage($reference,$emplacement,$quantite);

        include("./vues/v_stockage.php");
        
        break;
    }
}    
?>