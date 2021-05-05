<?php
require ('bdd_connect.php');
$db = new PDO(
'mysql:host='.$host.';dbname='.$dbname.'', 
$admin, $db_password,   
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
?>