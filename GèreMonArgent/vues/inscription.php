<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "../views/style.css"?></style>
    <title>autentification</title>
</head>
<body>
    
<?php include_once "../includes/fromwork.php"?>
<?php include_once "../includes/fromwork2.php"?>
<style>
  /* body{
    color: white;
  } */
</style>

        
<section style="border:1px solid">
          <h3 style="text-align: center; color:rgba(19, 0, 75, 0.952);margin-top:5px"><strong>S'INSCRIRE</strong></h3>
          <h5 style="text-align: center;">Entrer les parametres d'inscription</h5>

        <form action="../controllers/inscrirUtilisateur.php" method="POST" enctype="multipart/form-data">
            <section class="row" style="margin: 15px;">
              <div class="col-4"></div>
                  <div class="col-4">
                    <label class="form-label">nom</label>
                    <input type="text" class=form-control name="nom" required><br>
                    <label class="form-label">prenom</label>
                    <input type="text" class=form-control name="prenom" required><br>
                    <label class="form-label">numero Telephone</label>
                    <input type="number" class=form-control name="numTel" required><br>
                    <label class="form-label">email</label>
                    <input type="text" class="form-control" name="email" required><br>
                    <label class="form-label">mot de passe</label>
                    <input type="password" class="form-control" name="motDePasse" required><br>
                    <label class="form-label">confirmer mot de passe</label>
                    <input type="password" class="form-control" name="motDePasseconf" required><br>
                    
                
                    
            </section>
                <button type="sumit" value="s'inscrire" class="btn btn-block" style="background-color:rgba(19, 0, 75, 0.952); color:white; width:200px; margin-left:auto; margin-right:auto;">s'inscrire</button><br>
          
        </form>
        <p>vous avez deja un compte? <a href="autentification.php"> connectez-vous</a></p>
</section>
</body>
</html>