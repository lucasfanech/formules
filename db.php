<?php
// PDO connection to MySQL
try {
    $dbh = new PDO('mysql:host=localhost;dbname=formules', 'symfony', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<n/>";
    die();
}
?>

