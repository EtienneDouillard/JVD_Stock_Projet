


<?php

/*code à ajouter */ 

if(!isset($_REQUEST['action'])){

    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

switch($action){
//ajout pour téléchargement à modifier 
    case 'afficherBtnTelecharger':{

        include("./vues/v_telecharger.php");//ouverture de la page téléchargement

        break;
    }

    case 'telecharger':{
        //Action de télcharger lors de l'appui sur le boutton on appelle la fonction telechargerLesLots
        $telecharger = $pdo->telechargeLesLots();
        break;

      
    }

    
   
}    
?>