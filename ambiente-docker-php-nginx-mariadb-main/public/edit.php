<?php
require_once('banco.php'); //conecta no banco
  include('session.php');//inclui session.php (para testar se a sessao existe)

  $session = new poo; //cria estrutura
  $session->session(); //testa sessao

if(isset($_POST['nome'])){//testa se tem algum nome enviado por POST

  $nome = $_POST['nome']; //atribui valor da chave nome para variavel $nome
  $duracao = $_POST['duracao']; //atribui valor da chave duracao para variavel $duracao
  $descricao = $_POST['descricao']; //atribui valor da chave descricao para variavel $descricao
  $id = $_POST['id'];//atribui valor da chave ID para variavel $id

  $sql=$pdo->prepare("UPDATE filme SET nome = :nome, duracao = :duracao, descricao = :descricao WHERE ID = :id");
  $sql->bindParam(':nome', $nome); //bindando parametro para usar no UPDATE, deixa mais seguro contra sql injection
  $sql->bindParam(':duracao', $duracao);//bindando parametro para usar no UPDATE, deixa mais seguro contra sql injection
  $sql->bindParam(':descricao', $descricao);//bindando parametro para usar no UPDATE, deixa mais seguro contra sql injection
  $sql->bindParam(':id', $id);//bindando parametro para usar no UPDATE, deixa mais seguro contra sql injection

  $sql->execute();

  header('Location: painel.php');
}


$id = $_GET['ID'];
$sql=$pdo->prepare("Select * from filme WHERE ID=:id;");
$sql->bindParam(':id', $id);
$sql->execute();
$result = $sql->fetch();

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
           EDITAR FILME
        </div>
        <br>
<div class='m-5 d-flex justify-content-center align-items-center d-block'>
  <form method='POST' action = ''>
  <input type="hidden" name="id" value="<?php echo $result['ID']; ?>">
    <div class='form-row'>
      <div class='form-group'>
        <label for='inputEmail4'>Nome</label>
        <input type='text' class='form-control' name='nome' id='inputEmail4' value ='<?php  echo $result['nome']; ?>'>
      </div>
      <div class='form-group'>
        <label for='inputPassword4'>duracao (use 00:00:00)</label>
        <input type='text' class='form-control' name='duracao' id='inputPassword4' value ='<?php echo $result['duracao'];  ?>'>
      </div>
    </div>
    <div class='form-group'>

      <label for='inputAddress'>Descricao</label>
      <input type='text' class='form-control'name='descricao' id='inputAddress' value ='<?php  echo $result['descricao']; ?>'>
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