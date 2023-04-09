<?php

session_start(); //inicia sessao
session_destroy(); //destroi a sessao
header('Location: index.php'); // retorna para index
exit(); // para o codigo aqui
?>