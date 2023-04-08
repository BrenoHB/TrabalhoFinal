<?php
session_start();

require_once('banco.php');

if (isset($_SESSION['username'])) {
    header('Location: painel.php');
    exit;
}

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $senha = md5($senha);

    $sql = $pdo->prepare('select nome, senha FROM user WHERE nome = :nome AND senha = :senha');
    $sql->bindParam(":senha", $senha);
    $sql->bindParam(":nome", $nome);
    $sql->execute();
    $row = $sql->fetch();

    if ($row) {
        $_SESSION['username'] = $nome;
        header('Location: painel.php');
        exit;
    } else {
        echo "Algo deu errado!";
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
                <button type="" class="btn btn-danger" href="cadastrarusuario.php">Criar login</button>
            </form>
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
</style>

</html>