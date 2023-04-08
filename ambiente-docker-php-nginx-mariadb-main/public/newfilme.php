<?php
require_once('banco.php');

if(isset($_POST['nome'])){

  $nome = $_POST['nome'];
  $duracao = $_POST['duracao'];
  $descricao = $_POST['descricao'];
  

  $sql=$pdo->prepare("INSERT INTO filme (nome, duracao, descricao) VALUES (:nome, :duracao, :descricao)");
  $sql->bindParam(':nome', $nome);
  $sql->bindParam(':duracao', $duracao);
  $sql->bindParam(':descricao', $descricao);
 
  $sql->execute();

  header('Location: painel.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>



<div class='m-5 d-flex justify-content-center align-items-center d-block'>
  <form method='POST' action = ''>
    <div class='form-row'>
      <div class='form-group'>
        <label for='inputEmail4'>Nome</label>
        <input type='text' class='form-control' name='nome' id='inputEmail4'>
      </div>
      <div class='form-group'>
        <label for='inputPassword4'>duracao</label>
        <input type='text' pattern='^\d{2}:\d{2}:\d{2}$' class='form-control' name='duracao' id='inputPassword4'>
      </div>
    </div>
    <div class='form-group'>

      <label for='inputAddress'>Descricao</label>
      <input type='text' class='form-control'name='descricao' id='inputAddress'>
    </div><br>
    <button type='submit' class='btn btn-danger'>Alterar</button>
  </form>
</div>

    
</body>
</html>