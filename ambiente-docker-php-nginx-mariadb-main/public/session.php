<?php
session_start(); // inicia sessao

class poo {
    public static function session() { //cria funcao
        if (isset($_SESSION['nome'])) { //valida se sessao possui valor no indice nome
            return true;//retorna TRUE (embora nao seja usado em nenhum lugar)
        } else {
            header("Location: index.php"); //retorna para index.php, impedindo utilizacao das paginas sem sessao
            exit;//para o codigo aqui
        }
    }
}