<?php
session_start();

// Connexion à la base de données
$host="localhost";
$dbname="workshop";
$admin="root";
$db_password="";

$db = new PDO(
'mysql:host='.$host.';dbname='.$dbname.'', 
$admin, $db_password,   
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
?>