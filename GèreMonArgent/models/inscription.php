<?php
class Inscription
{
    private $nom;
    private $prenom;
    private $numTel;
    private $email;
    private $motDePasse;
    
    

    public function __construct($nom, $prenom, $numTel, $email, $motDePasse)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numTel = $numTel;
        $this->email = $email;
        $this->motDePasse = $motDePasse;

    }

    public function inscrirUtilisateur()
    {
        global $db;
        $resultat = false;

        $nom = $this->nom;
        $prenom = $this->prenom;
        $numTel = $this->numTel;
        $email = $this->email;
        $motDePasse = $this->motDePasse;
     

        $requete = 'INSERT INTO utilisateur (nom, prenom, numTel, email, motDePasse) VALUES (:nom, :prenom, :numTel,:email, :motDePasse)';

        $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

        $execution = $stetment->execute(
            [
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':numTel' => $numTel,
                ':email' => $email,
                ':motDePasse' => $motDePasse,
             
            ]
        );

        if ($execution) {
            $resultat = true;
        }
        return $resultat;
    }

    static function getInscriptionByEmail($email)
    {
        global $db;
        $requete = 'SELECT * FROM utilisateur WHERE email= :email';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':email' => $email
            ]
        );

        if ($execution) {
            if ($data = $stetment->fetch()) {
                $inscription = new Inscription ($data['nom'], $data['prenom'], $data['numTel'], $data['email'], $data['motDePasse']);
                return $inscription;
            } else return null;
        } else return null;
    }

    

    public function getNumUtilisateur(){
        global $db;
        $requete = 'SELECT numUtilisateur  FROM utilisateur WHERE nom = :nom AND numTel = :numTel';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':nom' => $this -> getNom(),
                ':numTel' => $this -> getNumTel()
                // ':adresse1' => $this -> getAdress1()
            ]
        );
        if ($execution) {
            if ($data = $stetment->fetch()) {
                $numUtilisateur = $data['numUtilisateur'];
                return $numUtilisateur;
            } else return null;
        } else return null;
    }

    static function getUtilisateurs(){
        global $db;
        $requete = 'SELECT * FROM utilisateur WHERE 1';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute ([]);
        $utilisateurs = [];
        if ($execution) {
            while ($data = $stetment -> fetch()) {
                $utilisateur = new Inscription ($data['nom'], $data['prenom'], $data['numTel'], $data['email'], $data['motDePasse'] );
                array_push($utilisateurs, $utilisateur);
            }
            return $utilisateurs;
        } else return [];
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function getNumTel()
    {
        return $this->numTel;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getMotDePasse()
    {
        return $this->motDePasse;

    }
    // public function getMotDePasseConf()
    // {
    //     return $this->motDePasseConf;
    // }

    /**
     * Set the value of ad$adress2
     *
    
      */ 
    // public function setAdress2($adress2)
    // {
    //     global $db;
    //     $query = 'UPDATE locataire SET adresse2 = :adresse2 WHERE numLocataire = :numLocataire';
    //     $stmt = $db->prepare($query);
    //     $stmt->execute([
    //     ':adresse2'=> $adress2,
    //     ':numLocataire'=>$this->getnumLocataire()
    //     ]);
    //        return $this;
    // }
}
?>