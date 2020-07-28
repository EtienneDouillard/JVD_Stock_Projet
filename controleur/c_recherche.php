<?php

if(!isset($_REQUEST['action'])){

    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

switch($action){

    case 'afficherFormRecherche':{

        include("./vues/v_search.php");

        break;
    }
}    
?>