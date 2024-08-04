<?php

include '../conexao.php';

function cadastrar() {
    $novo_contato = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
    ];
    criar_contato($novo_contato);
}

if ($_POST){
    cadastrar();
}
?>
