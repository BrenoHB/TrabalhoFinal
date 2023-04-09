<?php

require_once('banco.php'); // conecta no banco

session_start();//inicia sessao

if (isset($_SESSION['nome'])) { //verifica se a sessao ja foi setada, se sim encaminha para proxima pagina
    header('Location: painel.php');
    exit;
}

if (isset($_POST['nome']) && !empty($_POST['nome'])) {//valida o POST nome e SENHA, para garantir que nao estejam faltando
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $senha = md5($senha); //criptografa

    $sql = $pdo->prepare('select nome, senha FROM user WHERE nome = :nome AND senha = :senha');//prepara para executar comando SQL
    $sql->bindParam(":senha", $senha);//binda nome e senha
    $sql->bindParam(":nome", $nome);
    $sql->execute();//executa 
    $row = $sql->fetch();//$row recebe todos os valores de colunas da execucao anterior

    if ($row) {
        $_SESSION['nome'] = $row['nome'];//atribui o nome da sessao o valor nome do banco;
        header('Location: painel.php');// direciona para painel.php
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>CRUD</title>
</head>
<body>

<div class="container-fluid d-flex justify-content-center align-items-center vh-100">
    <div class="d-flex justify-content-center align-items-center card login">
        <div class="card-header">
            LOGIN
        </div>
        <div class="card-body">
            <form action="" method="post"> 
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" name='nome' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome">
                    <small id="emailHelp" class="form-text text-muted">Insira seu Nome de usuário</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" name='senha' id="exampleInputPassword1" placeholder="Senha">
                    <br>
                </div>
                <button type="submit" class=" btn btn-danger">Login</button>
              
</p>
            </form>
            <button class="btn btn-lg btn-secundary btn-block text-white bg-dark" type="button" onclick="location='cadastrarusuario.php'">Cadastre-se</button>
        </div>
    </div>
</div>

</body>



<style>

    .login{
        border-radius:20px;
    }
    body{
        background-color: black;
    }
    .card-body{
        
        font-weight: bold;
        color: black;
    }
    .card-header{
        background-color: 	#8B0000;
        font-weight: bold;
        color: white;
        
    }
    .bg-dark{
        align-items: left;
        display:flex;
        font-size: 12px;
    }
</style>

</html>