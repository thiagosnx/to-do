<?php

require_once('../database/conn.php');

$description = filter_input(INPUT_POST, 'description');

$prefixos = $_POST['prefixos'];



if($prefixos){
    $prefixosstr = implode(', ', $prefixos);

    $sql = $pdo->prepare("INSERT INTO task (description) VALUES (:description)");
    $sql->bindValue(':description', $prefixosstr);
    $sql->execute();

    header('Location: ../index.php');
    exit;
}else{
    echo "error";
    exit;
}