<?php

if(!isset($_REQUEST['action'])){

    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

switch($action){

    case 'afficherlots':{
        $reference = $_POST['reference'];

        $lesLots = $pdo->getLesLots($reference);

        include("vues/v_lot.php");

        break;
    }
}    
?>