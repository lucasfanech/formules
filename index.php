<?php
include('db.php');
// PDO connection to MySQL
// query to get all the records SELECT * FROM `list`
    $sql = "SELECT * FROM `list`";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de formules</title>
    <!-- Inclusion de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Inclusion du fichier de style personnalisé -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5">Liste de formules</h1>
    <hr>
    <!-- Barre de recherche -->
    <form class="form-inline my-3">
        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher" id="search">
    </form>
    <!-- Tableau de données -->
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Type</th>
            <th scope="col">Formule</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Affichage des données dans le tableau
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['formula'] . "</td>";
            echo "<td>" . $row['comment'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter une formule
    </button>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Ajouter une donnée</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addDataForm">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="60" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" maxlength="60" required>
                    </div>
                    <div class="form-group">
                        <label for="formula">Formule</label>
                        <input type="text" class="form-control" id="formula" name="formula" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" maxlength="255"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" maxlength="255" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" onclick="addData()">Ajouter</button>
            </div>
        </div>
    </div>
</div>




<!-- Inclusion de jQuery et de Bootstrap JS -->
<script src="js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ" crossorigin="anonymous"></script>
<script src="js/filter.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/addData.js"></script>