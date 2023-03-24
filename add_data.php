<?php
include("db.php");
// Reçoit en post les données du formulaire
$name = $_POST['name'];
$type = $_POST['type'];
$formula = $_POST['formula'];
$comment = $_POST['comment'];
$description = $_POST['description'];
// Requête SQL
$sql = "INSERT INTO list (name, type, formula, comment, description) VALUES (:name, :type, :formula, :comment, :description)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':formula', $formula);
$stmt->bindParam(':comment', $comment);
$stmt->bindParam(':description', $description);
$stmt->execute();

?>