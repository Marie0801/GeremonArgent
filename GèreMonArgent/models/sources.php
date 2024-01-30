<?php
class Source
{

    private $nom;
    private $descript;
    private $typeSource;

    public function __construct($nom, $descript, $typeSource)
    {
        $this->nom = $nom;
        $this->descript = $descript;
        $this->typeSource =$typeSource;
        
    }

    public function creerSource()
    {
        global $db;
        $resultat = false;

        $nom = $this->nom;
        $descript = $this->descript;
        $typeSource = $this->typeSource;
        
        $requete = 'INSERT INTO sourceRevenue (nom, descript, typeSource) VALUES (:nom, :descript, :typeSource)';

        $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

        $execution = $stetment->execute(
            [
                ':nom' => $nom,
                ':descript' => $descript,
                ':typeSource' => $typeSource
            ]
        );

        if ($execution) {
            $resultat = true;
        }
        return $resultat;
    }

    static function getSourceById($numSource)
    {
        global $db;
        $requete = 'SELECT * FROM sourceRevenue WHERE numSource = :numSource';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numSource' => $numSource
            ]
        );

        if ($execution) {
            if ($data = $stetment->fetch()) {
                $source = new Source ($data['nom'], $data['descript'], $data['typeSource']);
                return $source;
            } else return null;
        } else return null;
    }



    public function getIdSource(){
        global $db;
        $requete = 'SELECT numSource FROM sourceRevenue WHERE nom = :nom AND  descript = :descript';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':nom' => $this->getNom(),
                ':descript' => $this->getDescript()
                
            ]
        );
        if ($execution) {
            if ($data = $stetment->fetch()) {
                $numSource = $data['numSource'];
                return $numSource;
            } else return null;
        } else return null;
    }

    static function getSources(){
        global $db;
        $requete = 'SELECT * FROM sourceRevenue WHERE 1';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute ([]);
        $sources = [];
        if ($execution) {
            while ($data = $stetment -> fetch()) {
                $source = new Source ($data['nom'], $data['descript'], $data['typeSource']);
                array_push($sources,$source);
            }
            return $sources;
        } else return [];
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function getDescript()
    {
        return $this->descript;
    }
    public function getTypeSource()
    {
        return $this->typeSource;
    }
    
    /**
     * Set the value of TypeAppart
     *
     * @return  self
     */
}
?>