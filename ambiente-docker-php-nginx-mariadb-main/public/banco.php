<?php

// try{
    
$pdo = new PDO("mysql:host=mariadb;dbname=database;","root", "mariadb");

// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// // echo "Conexão bem sucedida!";

// }catch(PDOException $e) {
//     echo "Falha na conexão: " . $e->getMessage();
// }

//$senha = md5($_POST['senha']);

//$sql = $pdo->prepare("INSERT INTO user (nome, senha) VALUES (?, ?)");
//$sql->execute(array($_POST['nome'],$senha));
// $pdo->execute('DELETE FROM user;');
?>

