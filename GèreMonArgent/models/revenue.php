<?php
class Revenue
{

    private $numSource;
    private $montant;
    private $dateReception;

    public function __construct($numSource, $montant, $dateReception)
    {
        $this->numSource = $numSource;
        $this->montant = $montant;
        $this->dateReception =$dateReception;
        
    }

    public function creerRevenue()
    {
        global $db;
        $resultat = false;

        $numSource = $this->numSource;
        $montant = $this->montant;
        $dateReception = $this->dateReception;
        
        $requete = 'INSERT INTO revenu (numSource, montant, dateReception) VALUES (:numSource, :montant, :dateReception)';

        $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

        $execution = $stetment->execute(
            [
                ':numSource' => $numSource,
                ':montant' => $montant,
                ':dateReception' => $dateReception
            ]
        );

        if ($execution) {
            $resultat = true;
        }
        return $resultat;
    }

    static function getRevenueById($numRevenue)
    {
        global $db;
        $requete = 'SELECT * FROM revenu WHERE numRevenue = :numRevenue';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numRevenue' => $numRevenue
            ]
        );

        if ($execution) {
            if ($data = $stetment->fetch()) {
                $Source = new Revenue ($data['numSource'], $data['montant'], $data['dateReception']);
                return $Source;
            } else return null;
        } else return null;
    }



    public function getIdRevenue(){
        global $db;
        $requete = 'SELECT numRevenue FROM revenu WHERE numSource = :numSource AND  dateReception = :dateReception';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numSource' => $this->getNumSource(),
                ':dateReception' => $this->getDateReception()
                
            ]
        );
        if ($execution) {
            if ($data = $stetment->fetch()) {
                $numRevenue = $data['numRevenue'];
                return $numRevenue;
            } else return null;
        } else return null;
    }

    static function getRevenues(){
        
        global $db;
        $requete = 'SELECT * FROM revenu WHERE 1';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute ([]);
        $revenues = [];
        if ($execution) {
            while ($data = $stetment -> fetch()) {
                $revenue = new Revenue ( $data['numSource'], $data['montant'], $data['dateReception']);
                array_push($revenues,$revenue);
            }
            return $revenues;
        } else return [];
    }

    public function getNumSource()
    {
        return $this->numSource;
    }
    public function getMontant()
    {
        return $this->montant;
    }
    public function getDateReception()
    {
        return $this->dateReception;
    }
    
    /**
     * Set the value of TypeAppart
     *
     * @return  self
     */
}
?>