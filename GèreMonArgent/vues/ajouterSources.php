<?php include_once "../includes/fromwork.php"?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter source de revenue</title>
    <?php
    include_once "../includes/header.php";
    include "../controllers/getListeSouces.php";

    ?>
</head>
<body>
    <form action="../controllers/ajouterSources.php" method="POST">
    <section class="row" style="margin: 15px;">
            <div class="col-4"></div>
                <div class="col-4">
                    <label class="form-label">nom</label>
                    <input type="text" class="form-control" name="nom" required><br>

                    <label class="form-label">Description</label>
                    <textarea name="descript" id="" cols="30" rows="10" class="form-control"></textarea><br>
                    <label for="type" class="form-label">type de source de revenue</label>
                    <select name="type" id="" class="form-control">
                        <option value="travaille">travaille</option>
                        <option value="entreprise">entreprise</option>
                        <option value="opportuinite">opportuinite</option>
                        <option value="don">Don</option>

    </section>
                    </select><br>
                    <button type="submit" value="Envoyer" class="btn btn-block" style="background-color:rgba(19, 0, 75, 0.952); color:white; width:200px; margin-left:auto; margin-right:auto;">Enregistrer</button><br>
    </form>
    <div class="mx-5">
        <div class="text-center">
            <h2>LES SOURCES DE REVENUE</h2>
        </div><br>
        
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                    <th>Numero</th>
                    <th>Nom</th>
                    <th>Description</th>
            </tr>

            </thead>
                <?php
                $source = getListeSource();
                for($i = 0; $i < count($source); $i++) {
                    echo "<tr>";
                    echo "<th scope =\"row\">".$source[$i]->getIdSource()."</th>";
                    echo "<td>".$source[$i]->getNom()."</td>";
                    echo "<td>".$source[$i]->getDescript()."</td>";
                }
                ?>
            </table>
            
        </div>

                </div>
        
    <?php include_once "../includes/fromwork2.php"?>
</body>
</html>