<?php 
session_reset();
include '../configurations/config.php';
include '../models/inscription.php';

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $user= Inscription :: getInscriptionByEmail($email);
    if($user === null) {
        echo 'veiller entrez des informations correctes s\'il vous plait';
    }else{
        $pass= $_POST['motDePasse'];
        $passCorrect= $user->getMotDePasse();
       
       
        if($pass==$passCorrect){
           $id= password_verify($pass, $passCorrect);
            $_SESSION['nom'] = $user->getNom();
            $_SESSION['prenom'] = $user->getPrenom();
            $_GET['numTel'] = $user->getNumTel();
            $_GET['email'] = $user->getEmail();

            header("Location:../vues/acceuille.php");
            
        }
        else{
            echo ("le mot de pass est incorrect");
        }
        // if(password_verify($pass, $user->getMotDePasse())){
        //     echo "Bienvenue";
        // }
        // else{
        //     echo "mot de passe incorrect";
        // }

        //   if($pass== $user->getMotDePasse()){
        //     echo "Bienvenue";
        // }
        // else{
        //     echo "mot de passe incorrect";
        // }
    }
 }