<?php
class PdoJVD
{
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=jvd';
    private static $user = 'root';
    private static $mdp = 'root';
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
    public function getById($idLot) 
    {
        $req = "select * from lot where id_lot = '$idLot'";
        $res = PdoJVD::$monPdo->query($req);
        $leLot = $res->fetch();

        return $leLot;
    } 
    public function destockage($idLot,$quantite)
    {
        $bool = false;
        if(isset($idLot) AND isset($quantite))
        {
            $req = "select qte from lot where id_lot = '$idLot'";
            $res = PdoJVD::$monPdo->query($req);
            $qteTotal = $res->fetch();
            $qteRestante = $qteTotal['qte'] - $quantite;
            if($qteRestante >= 0)//On ne peut pas avoir de quantité négative
            {
                $req = "update lot set qte = '$qteRestante' where id_lot = '$idLot'";
                $res = PdoJVD::$monPdo->query($req);  
                $bool = true;
            }
        }  
        return $bool;  
    }
    public function stockage($reference,$emplacement,$quantite){
        $res = -1;
        if(!empty($reference) AND !empty($emplacement) AND !empty($quantite))//On vérifie que tous les champs sont remplis
        {
            $req = "select * from lot where reference = '$reference' and emplacement = '$emplacement'";
            $res = PdoJVD::$monPdo->query($req);
            $lot = $res->fetch();
            if($lot['reference'] == $reference AND $lot['emplacement'] == $emplacement)//si la référence à cet emplacement existe déjà alors on ajoute des unités
            {
                $qteTotal = $lot['qte'] + $quantite;
                $idLot = $lot['id_lot'];
                $req = "update lot set qte = '$qteTotal' where id_lot = '$idLot'";
                $res = PdoJVD::$monPdo->query($req);
                $res = 0;
            }
            else
            { 
                $req = "insert into lot (reference,emplacement,qte) values ('$reference','$emplacement','$quantite')";
                $res = PdoJVD::$monPdo->query($req);
                $res = 1;
            }
        }
        return $res;
    }
    public function delete($idLot){
        $req = "delete from lot where id_lot = '$idLot'";
        $res = PdoJVD::$monPdo->query($req);
    }
}

?>
