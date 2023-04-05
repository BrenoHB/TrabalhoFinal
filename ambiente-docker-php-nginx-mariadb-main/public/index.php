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
</head>
<body>
    <h1>Fazer Login</h1>
    <br>
    <div class="box">
        <div class="form">
            <form method="post" action="banco.php">
                <br>
                <label for="user">Usuario: </label><br>
                <input type="text" name="nome" id="user"><br>
                <label for="pass">Senha: </label><br>
                <input type="password" name="senha" id="pass"><br>
                <button type="submit">enviar</button>
                <br>
            </form>
        </div>
    </div>
    <div class="php">
    <?php

    ?>
    </div>
</body>
</html>
