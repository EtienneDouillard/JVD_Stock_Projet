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
        $emplacement = $_POST['emplacement'];
        $quantite = $_POST['quantite'];
        
        $stockage = $pdo->stockage($reference,$emplacement,$quantite);

        if($stockage == 2){
            include("vues/v_reference.php");
        }
        else{
            include("vues/v_stockage.php");
        }
        
        break;
    }
    case 'new_reference':{
        $reference = $_POST['reference'];
        $libelle = $_POST['libelle'];

        $new_ref = $pdo->addNewReference($reference,$libelle);

        $stockage = null;
        
        include("vues/v_stockage.php");
    }
}    
?>