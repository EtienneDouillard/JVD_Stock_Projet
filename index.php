
<!doctype html>
<html>
  <head>
    <link href="./CSS/entete.css" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <title>index</title>
    
  </head>

<?php

    session_start();

    require_once ("fonction/class.pdoJVD.inc.php");


    include("vues/v_entete.php");

    $pdo = PdoJVD::getPdoJVD();

    if(!isset($_REQUEST['uc'])){
        $_REQUEST['uc'] = 'accueil';
    }

    $uc = $_REQUEST['uc'];

    switch($uc){
        case 'recherche':{
            include("controleur/c_recherche.php");
            break;
        }    
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
    }    
?>
  <body>
    
  </body>
</html>

