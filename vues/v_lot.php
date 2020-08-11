
<div class="titre">
    <h3>Chercher une référence dans le stock</h3>  
</div>
<form method="POST" action="index.php?uc=lot&action=afficherlots">
    <input type="text" name="reference" placeholder= "recherche..." />
    <input type="submit" name="rechercher" value="rechercher"/>
</form>
<?php
if(isset($lesLots) AND !empty($lesLots))
{
?>
<form method="POST" action="index.php?uc=destockage&action=destocke">
    <table>
        <tr>
            <th>Sélection</th>
            <th>Référence</th>
            <th>Emplacement</th>
            <th>Quantité</th>
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
            <td><input type="radio" name= "id_lot" value="<?= $idLot?>" required/></td>
            <td><?php echo $reference ?></td>
            <td><?php echo $emplacement ?></td>
            <td><?php echo $qte ?></td>
        </tr>
            
    <?php   
        }  
    ?>
    </table>
    <div class="destock">
    <label  for="quantite">Quantité à déstocker : </label><input type="number" name="quantite" id="quantite" min="1" required/>
    </div>            
    <p class="btn">
        <input type="submit" name="destocke" id="destockage" value="Déstocker"/>
        <input type="submit" name="supprimer" id="supprimer" value="Supprimer"/>
        <input type="reset" value="Rénitialiser"/>
    </p>
    <script>
        document.getElementById("supprimer").addEventListener("click", removerequired);//Si l'utilisateur clic sur supprimer on désactive le required du champ quantite

        function removerequired() {
            document.getElementById("quantite").removeAttribute("required");
        }

        document.getElementById("destockage").addEventListener("click", addrequired);//Si l'utilisateur clic sur destocke on réactive l'attribut required

        function addrequired() {
            document.getElementById("quantite").setAttribute("required", "required");
        }
    </script>
</form>
<?php        
}  
else{
    echo '<p class="msg_erreur">Aucun résultat</p>';
}
?> 



