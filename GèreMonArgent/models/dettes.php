<?php
class Dette
{

    private $montant;
    private $creancier;
    private $dateDebut;
    private $dateFin;


    public function __construct($montant, $creancier, $dateDebut, $dateFin)
    {
        $this->montant = $montant;
        $this->creancier = $creancier;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        
    }

    public function creerDette()
    {
        global $db;
        $resultat = false;

        $montant = $this->montant;
        $creancier = $this->creancier;
        $dateDebut = $this->dateDebut;
        $dateFin = $this->dateFin;
        
        $requete = 'INSERT INTO dettes (montant, creancier, dateDebut, dateFin) VALUES (:montant, :creancier, :dateDebut, :dateFin)';

        $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

        $execution = $stetment->execute(
            [
                ':montant' => $montant,
                ':creancier' => $creancier,
                ':dateDebut' => $dateDebut,
                ':dateFin' => $dateFin
            ]
        );

        if ($execution) {
            $resultat = true;
        }
        return $resultat;
    }

    static function getDetteById($numDette)
    {
        global $db;
        $requete = 'SELECT * FROM dettes WHERE numDette = :numDette';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numDette' => $numDette
            ]
        );

        if ($execution) {
            if ($data = $stetment->fetch()) {
                $dette = new Dette ($data['montant'], $data['creancier'], $data['dateDebut'], $data['dateFin']);
                return $dette;
            } else return null;
        } else return null;
    }



    public function getIdDette(){
        global $db;
        $requete = 'SELECT numDette FROM dettes WHERE montant = :montant AND  creancier = :creancier AND dateDebut = :dateDebut';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':montant' => $this->getMontant(),
                ':creancier' => $this->getCreancier(),
                ':dateDebut' => $this->getDateDebut()
                
            ]
        );
        if ($execution) {
            if ($data = $stetment->fetch()) {
                $numDette = $data['numDette'];
                return $numDette;
            } else return null;
        } else return null;
    }

    static function getDettes(){
        global $db;
        $requete = 'SELECT * FROM dettes WHERE 1';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute ([]);
        $dettes = [];
        if ($execution) {
            while ($data = $stetment -> fetch()) {
                $dette = new Dette ($data['montant'], $data['creancier'], $data['dateDebut'], $data['dateFin']);
                array_push($dettes,$dette);
            }
            return $dettes;
        } else return [];
    }

    public function getMontant()
    {
        return $this->montant;
    }
    public function getCreancier()
    {
        return $this->creancier;
    }
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function getDateFin()
    {
        return $this->dateFin;
    }
    

    /**
     * Set the value of TypeAppart
     *
     * @return  self
     */
}
?>