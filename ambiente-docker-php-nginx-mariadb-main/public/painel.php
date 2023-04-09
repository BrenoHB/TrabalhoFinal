<?php

include('session.php'); //inclui arquivo session, POO para verificar sessao de forma mais agil, tava dando muito probleminha chato durante a programacao sem ele
$session = new poo; //define $session como do tipo POO
$session->session();//$session executa funcao session, resumo testa session.


    include('banco.php'); //inclui banco
    $sql = 'SELECT * FROM filme;';//$sql recebe uma string, a consulta que faremos no banco
    $result = $pdo->query($sql);//$result recebe os valores da query no banco

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

</head>
<body>


<form action="destroy.php" method="post">
<a class='m-5 btn btn-danger' href='destroy.php'>
    <label for="">SAIR</label>
</a>

</form>
<div class="m-5 ">
    <a class="btn btn-primary" href='newfilme.php'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
        </svg>
    </a>
    <br><br>

        
    <table class="table table-striped table-dark rounded">
        <thead>
            <tr>
            <th scope="col">FILME</th>
            <th scope="col">DURAÇÃO</th>
            <th scope="col">DESCRIÇÃO</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //PDO::FETCH_ASSOC nao eh necessario, pois serve apenas para receber as colunas pelo nome, caso usado sem ele, os indices do array terao chave tanto do valor da coluna como com um id
            echo "<tr>"; //printando HTML
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['duracao']."</td>";
            echo "<td>".$row['descricao']."</td>";
            echo "<td>
            <a class='btn btn-primary' href='edit.php?ID=$row[ID]'> "//cada botao tem um ID atribuido e href apontando para ...PHP?ID=(ID da coluna no banco), serve para saber qual id alterar no banco quando chamar a pagina edit.php
            ."<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
</svg>
            </a>";
            echo "
            <a class='btn btn-danger' href='remove.php?ID=$row[ID]'>"//cada botao tem um ID atribuido e href apontando para ...PHP?ID=(ID da coluna no banco), serve para saber qual id alterar no banco quando chamar a pagina remove.php
            ."<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
            </td>";
           
        }
            ?>
            </tr>
        </tbody>
</table>

</div>
</body>
<style>


body{
    background-color: black;
}
</style>
</html>

