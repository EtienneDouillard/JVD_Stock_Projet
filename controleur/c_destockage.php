<?php

if(!isset($_REQUEST['action'])){

    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

switch($action){

    case 'afficherFormDestockage':{
        $reference = $_POST['reference'];
        $numLot = $_POST['numLot'];

        include("./vues/v_destockage.php");

        break;
    }
    case 'destocke':{
        $idLot = $_POST['id_lot'];
        $quantite = $_POST['quantite'];

        $destockage = $pdo->destockage($idLot,$quantite);

        include("./vues/v_res_destockage.php");

        break;
    }
}    
?>