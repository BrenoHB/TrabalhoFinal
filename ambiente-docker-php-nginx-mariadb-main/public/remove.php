<?php
session_start();
if(!isset($_session['nome'])){

}


require_once('banco.php');

$id = $_GET['ID'];

$sql = $pdo->prepare('DELETE FROM filme WHERE id = :id');
$sql->bindParam(':id',$id);

$sql->execute();

header("Location: painel.php");

?>