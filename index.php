
<!doctype html>
<html>
<?php
    session_start();

    require_once ("fonction/class.pdojvd.inc.php");

    include("vues/v_entete.php");

    $pdo = PdoJVD::getPdoJVD();

    if(!isset($_REQUEST['uc'])){
        $_REQUEST['uc'] = 'accueil';
    }

    $uc = $_REQUEST['uc'];
   
    switch($uc){   
        case 'lot' :{
            include("controleur/c_lot.php");
            break;
        }
        case 'destockage' :{
            include("controleur/c_destockage.php");
            break;
        }
        case 'stockage' :{
            include("controleur/c_stockage.php");
            break;
        }
         /*code à ajouter sur serveur pour téléchargement des données   */ 
         case 'telecharger' :{
            include("controleur/c_telecharger.php");
            break;
        }

    }    
?>
</html>

