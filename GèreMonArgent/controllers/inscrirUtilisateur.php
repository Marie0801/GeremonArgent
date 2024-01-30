<?php

include '../configurations/config.php';
include '../models/inscription.php';
if(isset($_POST['nom'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numTel = $_POST['numTel'];
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
    $motDePasseConf = $_POST['motDePasseconf'];
    if ($motDePasse===$motDePasseConf) {
        // $pass=password_hash($motDePasse, PASSWORD_DEFAULT);
        $utilisateur = new Inscription ($nom, $prenom, $numTel, $email, $motDePasseConf);

        if ($utilisateur -> inscrirUtilisateur()){
            header("Location:../vues/autentification.php");


        }
    }else{
        echo ("les mots de passe doivent correspondre");
    }

}
?>