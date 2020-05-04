<?php


$databaseHost = 'localhost';
$databaseName = 'res-profile';
$databaseUsername = 'root';
$databasePassword = '';
 
try {
    $pdo = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}
 
?>