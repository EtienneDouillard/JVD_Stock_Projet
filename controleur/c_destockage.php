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
            $id_lot = $_POST['id_lot'];
            $quantite = $_POST['quantite'];

            if(isset($_POST['destocke'])){//Si l'utilisateur veut destocker un lot
                $destockage = $pdo->destockage($id_lot,$quantite);
            
                $leLot = $pdo->getById($id_lot);//On récupère les données de l'élément à destocker

                $id_lot = $leLot['id_lot'];
                $reference = $leLot['reference'];
                $emplacement = $leLot['emplacement'];
                
                include("vues/v_destockage.php");
            }
            else if(isset($_POST['supprimer'])){//Si l'utilisateur veut supprimer un lot 
                $suppression = $pdo->delete($id_lot);

                include("vues/v_supprimer.php");
            }
        break;
    }
}    
?>