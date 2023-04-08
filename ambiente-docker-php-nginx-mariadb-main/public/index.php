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
    <title>CRUD</title>
    <style>
        .form{
            width: 300px;
            height: 300px;
            background: #fff;
        }
        .box{
            width: 100vw;
            height: 100vh;
            background: ;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        body {
            margin: 0px;
        }
        .php{
            width: 100vw;
            height: 100vh;
            background: #6C7A89;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
    </style>

    <link rel='stylesheet' href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    
    <br>
    <div class="box">
        <div class="form">
        <h1>Fazer Login</h1>

            <form method="post" action="">
                <br>

                <label for="user">Usuario: </label><br>
                <input type="text" name="nome" id="user"><br>

                <label for="pass">Senha: </label><br>
                <input type="password" name="senha" id="pass"><br>

                <button type="submit">Login</button>
                <a href="cadastrarusuario.php">Ou cadastre aqui seu usuario!</a>

                <br>

            </form>

        </div>
    </div>
</body>
</html>