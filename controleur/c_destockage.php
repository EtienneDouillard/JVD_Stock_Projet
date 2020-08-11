<?php

if(!isset($_REQUEST['action'])){

    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

switch($action){
    case 'afficherformrecherche':{
        include("vues/v_recherche.php");

        break;
    }
    case 'destocke':{
            $idLot = $_POST['id_lot'];
            $quantite = $_POST['quantite'];

            if(isset($_POST['destocke'])){//Si l'utilisateur veut destocker un lot
                $destockage = $pdo->destockage($idLot,$quantite);
            
                $leLot = $pdo->getById($idLot);//On récupère les données de l'élément à destocker
                $reference = $leLot['reference'];
                $emplacement = $leLot['emplacement'];
                
                include("vues/v_destockage.php");
            }
            else if(isset($_POST['supprimer'])){//Si l'utilisateur veut supprimer un lot 
                $suppression = $pdo->delete($idLot);

                include("vues/v_supprimer.php");
            }
        break;
    }
}    
?>