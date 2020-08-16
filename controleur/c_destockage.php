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
            $reference = $_POST['reference'];
            $numero = $_POST['numero'];
            $quantite = $_POST['quantite'];

            if(isset($_POST['destocke'])){//Si l'utilisateur veut destocker un lot
                $destockage = $pdo->destockage($reference, $numero, $quantite);
            
                $leLot = $pdo->getByRefNum($reference, $numero);//On récupère les données de l'élément à destocker
                dump($reference);
                die();
                $emplacement = $leLot['emplacement'];
                
                include("vues/v_destockage.php");
            }
            else if(isset($_POST['supprimer'])){//Si l'utilisateur veut supprimer un lot 
                $suppression = $pdo->delete($reference,$numero);

                include("vues/v_supprimer.php");
            }
        break;
    }
}    
?>