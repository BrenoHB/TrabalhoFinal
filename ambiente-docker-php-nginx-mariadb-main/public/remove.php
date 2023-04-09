<?php
require_once('banco.php'); //conecta no banco


include('session.php'); //valida sessao
$session = new poo;//valida sessao
$session->session();//valida sessao



$id = $_GET['ID']; //recebe ID pela URL

$sql = $pdo->prepare('DELETE FROM filme WHERE id = :id'); //prepara consulta
$sql->bindParam(':id',$id); //binda parametro para consulta segura
$sql->execute(); //executa
header("Location: index.php"); //retorna para header
exit();//para o codigo aqui

    ?>