<?php
$host = "mysql";
$dbname = "drinkbeer";
$user = "root";
$pass = "root";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    echo "ALASLDLSADLSALDLSADLASLD ACCESSES MUCHES MySQL!";
} catch (PDOException $e) {
    echo "ERROR NO CONNEXION PUTANM: " . $e->getMessage();
}
