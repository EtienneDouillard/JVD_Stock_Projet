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
}    
?>