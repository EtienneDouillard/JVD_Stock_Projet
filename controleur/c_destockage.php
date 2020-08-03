<?php

if(!isset($_REQUEST['action'])){

    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

switch($action){
    case 'destocke':{
            $idLot = $_POST['id_lot'];
            $quantite = $_POST['quantite'];

            $destockage = $pdo->destockage($idLot,$quantite);

            include("./vues/v_destockage.php");
        break;
    }
}    
?>