<?php

$dsn = "mysql:dbname=location_voiture;host=localhost";
$user = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $user, $password);
    // echo "connect " ;
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}