<?php

class Repartition
{

    private $numRevenue;
    private $dime;
    private $epargne;
    private $donDeCharite;
    private $numDette;
    private $autresDepense;

    public function __construct($numRevenue, $dime, $epargne, $donDeCharite, $numDette, $autresDepense)
    {
        $this->numRevenue = $numRevenue;
        $this->dime = $dime;
        $this->epargne = $epargne;
        $this->donDeCharite = $donDeCharite;
        $this->numDette = $numDette;
        $this->autresDepense = $autresDepense;
        
    }

    public function creerRepartition()
{
    global $db;
    $resultat = false;

    $numRevenue = $this->numRevenue;
    $dime = $this->dime;
    $epargne = $this->epargne;
    $donDeCharite = $this->donDeCharite;
    $numDette = $this->numDette;
    $autresDepense = $this->autresDepense;

    // Calcul du pourcentage
    $montantDime = ($dime / 100) * $numRevenue;
    $montantEpargne = ($epargne / 100) * $numRevenue;
    $montantDonDeCharite = ($donDeCharite / 100) * $numRevenue;
    $montantNumDette = ($numDette / 100) * $numRevenue;
    $montantAutresDepense = ($autresDepense / 100) * $numRevenue;

    $requete = 'INSERT INTO repartition (numRevenue, dime, epargne, donDeCharite, numDette, autresDepense) 
                VALUES (:numRevenue, :dime, :epargne, :donDeCharite, :numDette, :autresDepense)';

    $statement = $db->prepare($requete);

    if ($statement) {
        $execution = $statement->execute(
            [
                ':numRevenue' => $numRevenue,
                ':dime' => $montantDime,
                ':epargne' => $montantEpargne,
                ':donDeCharite' => $montantDonDeCharite,
                ':numDette' => $montantNumDette,
                ':autresDepense' => $montantAutresDepense
            ]
        );

        if ($execution) {
            $resultat = true;
        }
    }

    return $resultat;
}

    
//     <?php
// class Repartition
// {

//     private $numRevenue;
//     private $pourcentageDime;
//     private $pourcentageEpargne;
//     private $pourcentageDonDeCharite;
//     private $pourcentageNumDette;
//     private $pourcentageAutresDepense;

//     public function __construct($numRevenue, $pourcentageDime, $pourcentageEpargne, $pourcentageDonDeCharite, $pourcentageNumDette, $pourcentageAutresDepense)
//     {
//         $this->numRevenue = $numRevenue;
//         $this->pourcentageDime = $pourcentageDime;
//         $this->pourcentageEpargne = $pourcentageEpargne;
//         $this->pourcentageDonDeCharite = $pourcentageDonDeCharite;
//         $this->pourcentageNumDette = $pourcentageNumDette;
//         $this->pourcentageAutresDepense = $pourcentageAutresDepense;
//     }

//     public function creerRepartition()
//     {
//         global $db;
//         $resultat = false;

//         $numRevenue = $this->numRevenue;
//         $pourcentageDime = $this->pourcentageDime;
//         $pourcentageEpargne = $this->pourcentageEpargne;
//         $pourcentageDonDeCharite = $this->pourcentageDonDeCharite;
//         $pourcentageNumDette = $this->pourcentageNumDette;
//         $pourcentageAutresDepense = $this->pourcentageAutresDepense;

//         // Calcul des montants en fonction des pourcentages
//         $montantDime = ($pourcentageDime / 100) * $numRevenue;
//         $montantEpargne = ($pourcentageEpargne / 100) * $numRevenue;
//         $montantDonDeCharite = ($pourcentageDonDeCharite / 100) * $numRevenue;
//         $montantNumDette = ($pourcentageNumDette / 100) * $numRevenue;
//         $montantAutresDepense = ($pourcentageAutresDepense / 100) * $numRevenue;

//         $requete = 'INSERT INTO repartition (numRevenue, dime, epargne, donDeCharite, numDette, autresDepense) VALUES (:numRevenue, :dime, :epargne, :donDeCharite, :numDette, :autresDepense)';

//         $statement = $db->prepare($requete);

//         $execution = $statement->execute(
//             [
//                 ':numRevenue' => $numRevenue,
//                 ':dime' => $montantDime,
//                 ':epargne' => $montantEpargne,
//                 ':donDeCharite' => $montantDonDeCharite,
//                 ':numDette' => $montantNumDette,
//                 ':autresDepense' => $montantAutresDepense
//             ]
//         );

//         if ($execution) {
//             $resultat = true;
//         }
//         return $resultat;
//     }

//     // ... (autres méthodes de la classe)
// }
//


    static function getRepartitionById($numRepartition)
    {
        global $db;
        $requete = 'SELECT * FROM repartition WHERE numRepartition = :numRepartition';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numRepartition' => $numRepartition
            ]
        );

        if ($execution) {
            if ($data = $stetment->fetch()) {
                $repartition = new Repartition ($data['numRevenue'], $data['dime'], $data['epargne'], $data['donDeCharite'], $data['numDette'], $data['autresDepense']);
                return $repartition;
            } else return null;
        } else return null;
    }



    public function getIdRepartition(){
        global $db;
        $requete = 'SELECT numRepartition FROM repartition WHERE numRevenue = :numRevenu AND  dime = :dime';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numRevenue' => $this->getNumRevenue(),
                ':dime' => $this->getDime()
                
            ]
        );
        if ($execution) {
            if ($data = $stetment->fetch()) {
                $numRepartition = $data['numRepartition'];
                return $numRepartition;
            } else return null;
        } else return null;
    }

    static function getRepartitions(){
        global $db;
        $requete = 'SELECT * FROM repartition WHERE 1';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute ([]);
        $repartitions = [];
        if ($execution) {
            while ($data = $stetment -> fetch()) {
                $repartition = new Repartition ($data['numRevenue'], $data['dime'], $data['epargne'], $data['donDeCharite'], $data['numDette'], $data['autresDepense']);
                array_push($repartitions,$repartition);
            }
            return $repartitions;
        } else return [];
    }

    public function getNumRevenue()
    {
        return $this->numRevenue;
    }
    public function getDime()
    {
        return $this->dime;
    }
    public function getEpargne()
    {
        return $this->epargne;
    }
    public function getDonDeCharite()
    {
        return $this->donDeCharite;
    }
    public function getNumDette()
    {
        return $this->numDette;
    }
    public function getAutresDepense()
    {
        return $this->autresDepense;
    }
    
    /**
     * Set the value of TypeAppart
     *
     * @return  self
     */
}
?>