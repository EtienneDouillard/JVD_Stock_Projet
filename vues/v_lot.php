<!doctype html>
<html>
  <head>
    <link href="./CSS/lot.css" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <title>Recherche</title>
    
  </head>
    <body>
        <div class="container" role="main">
            <p class="bg-success">
               <h3>Chercher une référence dans le stock</h3>  
            </p>
            <form method="POST" action="index.php?uc=lot&action=afficherLots">
                <input type="text" name="reference" placeholder= "recherche..." />
                <input type="submit" name="rechercher" value="rechercher"/>
            </form>
            <?php
                if(isset($lesLots) AND !empty($lesLots)){
            ?>
            <form method="POST" action="index.php?uc=destockage&action=destocke">
            <table>
                <tr>
                    <th >Sélection</th>
                    <th >idLot</th>
                    <th >Référence</th>
                    <th >Emplacement</th>
                    <th >Quantité</th>
                </tr>
            <?php      
                    foreach ($lesLots as $unLot)//On affiche chaque entrée une à une
                    {
                        $idLot = $unLot['id_lot'];
                        $reference = $unLot['reference'];
                        $numLot = $unLot['numero'];
                        $emplacement = $unLot['emplacement'];
                        $qte = $unLot['qte'];
            ?>     
                    <tr>
                        <td><input type="radio" name= "id_lot" value="<?= $idLot?>"/></td>
                        <td><?php echo $idLot ?></td>
                        <td><?php echo $reference ?></td>
                        <td><?php echo $emplacement ?></td>
                        <td><?php echo $qte ?></td>
                    </tr>
            <?php   
                    }  
            ?>
            </table>
                <section class="Quantité_destockée"><!-- Formulaire pour la quantitée destockée -->
                    <h4> Quantité déstockée : <i class="fas fa-thermometer-quarter"></i> </h4>
                    <div class="slidecontainer">
                    <input id="number" type="number" name="quantite">            
                    </div>
                </section>
                <br>
                <div id="button"><!-- Boutons soumettre et rénitialiser-->
                    <input type="submit" name="soumettre" value="Soumettre"/>
                    <input type="reset" value="Rénitialiser"/>
                </div>
            </form>
            <?php        
                }  
                else{
                    echo "Aucun résultat";
                }
            ?> 
        </div>       
    




    </body>
</html>


