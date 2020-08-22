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
        $req = "select * from lot where reference like '$reference%'";
        $res = PdoJVD::$monPdo->query($req);
        $lesLots = $res->fetchAll();

        return $lesLots;
    }

    

 //Fonction de télchargement de la base de données dans son intégralité. 
    public function telechargeLesLots()
    {
          
        //requete
       // $req = "SELECT DISTINCT reference FROM jvd ORDER BY reference;";
        $req = "select * from lot";
        $retours = PdoJVD::$monPdo->query($req);
        $lesLots = $retours->fetchAll(); //récupère  toute la base de données

        //création du fichier 
        $fichier = fopen("../export.csv","w");//lien à modifier pour exporer sur le bureau 
        fclose($fichier);

        //Ouverture en écriture 
        $fichier = fopen("../export.csv","w+");//lien à modifier pour exporer sur le bureau 
        $chaine="";

        foreach ($lesLots as $unLot)//On affiche chaque entrée une à une
        {
            $reference = $unLot['reference'];
            $emplacement = $unLot['emplacement'];
            $qte = $unLot['qte'];
            
            //Ajout des données dans la chaine 
            $chaine = "\"".$reference."\";";
            $chaine .= "\"".$emplacement."\";";
            $chaine .= "\"".$qte."\";";

            fwrite($fichier,$chaine."\r\n");//saut de ligne 

            /*
            echo '<p> reference =' . $reference . '</p>'; 
            echo '<p> emplacment = ' . $emplacement . '</p>'; 
            echo '<p>Quantité ='  . $qte . '</p>';
            */
        }
        
        fclose($fichier);
        $bool=true;

        echo '<p class="msg_success"> Ok téléchargement avec succès </p>';
        
        return $bool;
    }
//////////////////////////////////////////////////////////////////


    public function getByRefNum($reference, $numero) 
    {
        $req = "select * from lot where reference = '$reference' AND numero = '$numero'";
        $res = PdoJVD::$monPdo->query($req);
        $leLot = $res->fetch();

        return $leLot;
    } 
    public function destockage($reference,$numero,$quantite)
    {
        $bool = false;
        if(isset($numero) AND isset($reference) AND isset($quantite))
        {
            $req = "select qte from lot where reference = '$reference' AND numero = '$numero'";
            $res = PdoJVD::$monPdo->query($req);
            $qteTotal = $res->fetch();
            $qteRestante = $qteTotal['qte'] - $quantite;
            if($qteRestante >= 0)//On ne peut pas avoir de quantité négative
            {
                $req = "update lot set qte = '$qteRestante' where reference = '$reference' AND numero = '$numero'";
                $res = PdoJVD::$monPdo->query($req);  
                $bool = true;
            }
        }  
        return $bool;  
    }
    public function stockage($reference,$numero,$emplacement,$quantite){
        $res = -1;
        if(!empty($reference) AND !empty($numero) AND !empty($emplacement) AND !empty($quantite))//On vérifie que tous les champs sont remplis
        {
            $req = "select * from lot where reference = '$reference' and emplacement = '$emplacement'";
            $res = PdoJVD::$monPdo->query($req);
            $lot = $res->fetch();
            if($lot['reference'] == $reference AND $lot['emplacement'] == $emplacement)//si la référence à cet emplacement existe déjà alors on ajoute des unités
            {
                $qteTotal = $lot['qte'] + $quantite;
                $reference = $lot['reference'];
                $numero = $lot['numero'];
                $req = "update lot set qte = '$qteTotal' where reference = '$reference' AND numero = '$numero'";
                $res = PdoJVD::$monPdo->query($req);
                $res = 0;
            }
            else
            { 
                $req = "insert into lot (reference,numero,emplacement,qte) values ('$reference','$numero','$emplacement','$quantite')";
                $res = PdoJVD::$monPdo->query($req);
                $res = 1;
            }
        }
        return $res;
    }
    public function delete($reference, $numero){
        $req = "delete from lot where reference = '$reference' AND numero = '$numero'";
        $res = PdoJVD::$monPdo->query($req);
    }
}

?>
