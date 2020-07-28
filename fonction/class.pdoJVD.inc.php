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
        if (PdoJVD::$monPdoJVD == null) {
            PdoJVD::$monPdoJVD = new PdoJVD();
        }
        return PdoJVD::$monPdoJVD;
    }
    public function getLesLots($reference)
    {
        $req = "select id_lot,reference,numero,emplacement,qte from lot where reference like '$reference'";
        $res = PdoJVD::$monPdo->query($req);
        $lesLots = $res->fetchAll();

        return $lesLots;
    }
    public function destockage($idLot,$quantite)
    {
        $bool = false;
        $req = "select qte from lot where id_lot = '$idLot'";
        $res = PdoJVD::$monPdo->query($req);
        $qteTotal = $res->fetch();
        $qteRestante = $qteTotal['qte'] - $quantite;
        if($qteRestante >= 0){
            $req = "update lot set qte = '$qteRestante' where id_lot = '$idLot'";
            $res = PdoJVD::$monPdo->query($req);  

            $bool = true;
        }    
        return $bool;
    }
    public function stockage($reference,$emplacement,$quantite){
        var_dump($reference);
        $req = "insert into lot (reference,emplacement,qte) values ('$reference','$emplacement','$quantite')";
        $res = PdoJVD::$monPdo->query($req);
        var_dump($res);
    }
}

?>