<?php
session_start(); //inicia sessao (embora nao seja usada)

    include('banco.php');//conecta no banco

    if(isset($_POST['nome']) && isset($_POST['senha'])){ //valida se chaves nome e senha estao setadas
    $nome = $_POST['nome']; //atribui valor da chave para variavel
    $senha  =$_POST['senha'];//atribui valor da chave para variavel
    $senha = md5($senha); //criptografa senha

    $sql = $pdo->prepare('SELECT COUNT(*) FROM user WHERE nome = :nome'); //prepara consulta
    $sql->bindParam(":nome", $nome); //binda parametro para consulta segura
    $sql->execute(); //executa
    $exists = $sql->fetchColumn(); //aramazena coluna nome em exist

    if ($exists>0) { //valida se existe mais de um usuario
        echo "Usuário já foi registrado!";
    } else { 
        $sql = $pdo->prepare('INSERT INTO user VALUES (NULL, :nome, :senha)'); //prepara consulta
        $sql->bindParam(":senha", $senha);//binda paramentros para consulta segura
        $sql->bindParam(":nome", $nome);
        $sql->execute();//executa
        
        header('Location: index.php');//retorna para inndex
        exit();//para condigo aqui
    }
}

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    
<div class="container-fluid d-flex justify-content-center align-items-center vh-100">
    <div class="d-flex justify-content-center align-items-center card login">
        <div class="card-header">
           CADASTRO
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
                <button type="submit" class=" btn btn-danger">Cadastro</button>
            </form>
        </div>
    </div>
</div>

    <style>
        body{
            background-color:black;
        }
        .card-header{
        background-color: 	#8B0000;
        font-weight: bold;
        color: white;
        
    }
    </style>
</body>
</html>
