<?php
require_once('banco.php'); //conecta no banco
include('session.php');//valida sessao
$session = new poo;// valida sessao
$session->session();// valida sessao

if(isset($_POST['nome'])){//testa se cahve nome ta setada

  $nome = $_POST['nome'];
  $duracao = $_POST['duracao'];
  $descricao = $_POST['descricao'];
  

  $sql=$pdo->prepare("INSERT INTO filme (nome, duracao, descricao) VALUES (:nome, :duracao, :descricao)"); //prepara consulta
  $sql->bindParam(':nome', $nome); //binda parametro para consulta segura
  $sql->bindParam(':duracao', $duracao);
  $sql->bindParam(':descricao', $descricao);
 
  $sql->execute(); //executa consulta

  header('Location: painel.php'); //volta para painel
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


<div class="card-header">
           ADICIONAR FILME
        </div>
        <br>
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

  <style>
    .card-header{
      font-weight: bold;
      background-color: #8B0000;
      color:white;
    
      text-align:center;
    }
    body{
      font-weight: bold;
      background-color: black;
      color:white;
    }

  </style>
</body>
</html>