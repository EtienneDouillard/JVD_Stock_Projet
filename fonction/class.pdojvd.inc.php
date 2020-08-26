<?php
class PdoJVD
{
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=jvd';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoJVD = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct()
    {
        PdoJVD::$monPdo = new PDO(PdoJVD::$serveur . ';' . PdoJVD::$bdd, PdoJVD::$user, PdoJVD::$mdp);
        PdoJVD::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function _destruct()
    {
        PdoJVD::$monPdo = null;
    }
    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoJVD = PdoJVD::getPdoJVD();
     * @return l'unique objet de la classe PdoJVD
     */
    public static function getPdoJVD()
    {
        if (PdoJVD::$monPdoJVD == null) 
        {
            PdoJVD::$monPdoJVD = new PdoJVD();
        }
        return PdoJVD::$monPdoJVD;
    }
    public function getLesLots($reference) 
    {
        $req = "select * from lot inner join reference on lot.id_ref = reference.id_ref where reference like '$reference%'";
        $res = PdoJVD::$monPdo->query($req);
        $lesLots = $res->fetchAll();

        return $lesLots;
    }
    public function telechargeLesLots()//Fonction de télchargement de la base de données dans son intégralité.
    {
        header('Content-Type: text/csv;');
        header('Content-Disposition: attachment; filename="export.csv"');
        header("Location: BDD/export.csv");

        $req = "select reference,libelle,emplacement,qte from lot inner join reference on lot.id_ref = reference.id_ref";
        $retours = PdoJVD::$monPdo->query($req);
        $lesLots = $retours->fetchAll(); //récupère  toute la base de données

        //création du fichier 
        $fichier = fopen("BDD/export.csv","w");//lien à modifier pour exporer sur le bureau 
        fclose($fichier);
        
        //Ouverture en écriture 
        $fichier = fopen("BDD/export.csv","w+");//lien à modifier pour exporer sur le bureau 
        $chaine = "";
        $titre = "Référence;Libellé;Emplacement;Quantité;\n";
        $titre = utf8_decode($titre); 
        fwrite($fichier,$titre);

        foreach ($lesLots as $unLot)//On affiche chaque entrée une à une
        {
            $reference = $unLot['reference'];
            $libelle = $unLot['libelle'];
            $emplacement = $unLot['emplacement'];
            $qte = $unLot['qte'];
            
            // //Ajout des données dans la chaine 
            $chaine = "\"".$reference."\";";
            $chaine .= "\"".$libelle."\";";
            $chaine .= "\"".$emplacement."\";";
            $chaine .= "\"".$qte."\";";
            
            $chaine = utf8_decode($chaine."\n");//Saut de ligne + caractères spéciaux

            fwrite($fichier,$chaine);    
        }
        
        fclose($fichier);

        echo '<p class="msg_success"> Ok téléchargement avec succès </p>';
    }
    public function getById($id_lot) 
    {
        $req = "select * from lot inner join reference on lot.id_ref = reference.id_ref where id_lot = '$id_lot'";
        $res = PdoJVD::$monPdo->query($req);
        $leLot = $res->fetch();

        return $leLot;
    } 
    public function destockage($id_lot,$quantite)
    {
        $bool = false;
        if(isset($id_lot) AND isset($quantite))
        {
            $req = "select qte from lot where id_lot = '$id_lot'";
            $res = PdoJVD::$monPdo->query($req);
            $qteTotal = $res->fetch();
            $qteRestante = $qteTotal['qte'] - $quantite;
            if($qteRestante >= 0)//On ne peut pas avoir de quantité négative
            {
                $req = "update lot set qte = '$qteRestante' where id_lot = '$id_lot'";
                $res = PdoJVD::$monPdo->query($req);  
                $bool = true;
            }
        }  
        return $bool;  
    }
    public function stockage($reference,$emplacement,$quantite){
        $int = -1;
        if(!empty($reference) AND !empty($emplacement) AND !empty($quantite))//On vérifie que tous les champs sont remplis
        {
            $req = "select * from reference where reference = '$reference'";
            $res = PdoJVD::$monPdo->query($req);
            $ref = $res->fetch();
            $id_ref = $ref['id_ref'];
            $int = 2;
            if($ref)
            {
                $req = "select * from lot inner join reference on lot.id_ref = reference.id_ref where reference = '$reference' and emplacement = '$emplacement'";
                $res = PdoJVD::$monPdo->query($req);
                $lot = $res->fetch();
                if($lot['reference'] == $reference AND $lot['emplacement'] == $emplacement)//si la référence à cet emplacement existe déjà alors on ajoute des unités
                {
                    $qteTotal = $lot['qte'] + $quantite;
                    $lot = $lot['id_lot'];
                    $req = "update lot set qte = '$qteTotal' where id_lot = '$lot'";
                    $res = PdoJVD::$monPdo->query($req);
                    $int = 0;
                }
                else
                { 
                    $req = "insert into lot (id_ref,emplacement,qte) values ('$id_ref','$emplacement','$quantite')";
                    $res = PdoJVD::$monPdo->query($req);
                    $int = 1;
                }
            }
        }
        return $int;
    }
    public function addNewReference($reference,$libelle){
        $req = "insert into reference (reference,libelle) values ('$reference','$libelle')";
        $res = PdoJVD::$monPdo->query($req);
    }
    public function delete($id_lot){
        $req = "delete from lot where id_lot = '$id_lot'";
        $res = PdoJVD::$monPdo->query($req);
    }
}

?>
