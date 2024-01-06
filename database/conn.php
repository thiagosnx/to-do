<?php

$hostname= 'localhost';
$database= 'todo';
$username= 'root';
$password= '';




try{
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}