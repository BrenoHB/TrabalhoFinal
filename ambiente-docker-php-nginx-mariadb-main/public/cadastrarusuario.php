

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
    
    <br>
    <div class="box">
        <div class="form">
        <h1>Fazer cadastro:</h1>
            <form method="post" action="">
                <br>
                <label for="user">Usuario: </label><br>
                <input type="text" name="nome" id="user"><br>
                <label for="pass">Senha: </label><br>
                <input type="password" name="senha" id="pass"><br>
                <input type="submit" value="cadastrar usuario">
                <br>
            </form>
        </div>
    </div>
    <div class="php">
    <?php
    include('banco.php');
/*
--------------------------------------------------------------------------------------------------------------------------*
Achei comico a situação que passei abaixo:

passei por volta de 2horas procurando a solução para um problema no meu codigo, os usuarios estavam
sendo inseridos mesmo que com o mesmo nome de outros ja existentes.
Quebrei a cabeça tentando achar algum problema nesta pagina, aí pintou a ideia na minha cabeça, o que sera que 
tem no banco.php? (até entao eu só lembrava que tinha a conexão).

$senha = md5($_POST['senha']);
$sql = $pdo->prepare("INSERT INTO user (nome, senha) VALUES (?, ?)");
$sql->execute(array($_POST['nome'],$senha));

isso estava dentro do arquivo banco.php kkkkkkkkkk, por fim eu adicionei a propriedade no banco de dados que nao permite
itens identicos na tabela user coluna nome.
ALTER TABLE user ADD CONSTRAINT nome_unico UNIQUE (nome);

__________________________________________________________________________________________________________________________*
*/
    if(isset($_POST['nome']) && isset($_POST['senha'])){
    $nome = $_POST['nome'];
    $senha  =$_POST['senha'];
    $senha = md5($senha);

$sql = $pdo->prepare('SELECT COUNT(*) FROM user WHERE nome = :nome');
$sql->bindParam(":nome", $nome);
$sql->execute();
$exists = $sql->fetchColumn();

if ($exists>0) {
    echo "Usuário já foi registrado!";
} else {
    
    $sql = $pdo->prepare('INSERT INTO user VALUES (NULL, :nome, :senha)');
    $sql->bindParam(":senha", $senha);
    $sql->bindParam(":nome", $nome);
    $sql->execute();
}
    }else{
        echo"insira novamente o nome de ususario";
    }
    ?>
    </div>
</body>
</html>
