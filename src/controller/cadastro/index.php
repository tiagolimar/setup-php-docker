<?php

include '../_conexao/index.php';

function cadastrar($pdo,$nome_t     abela) {
    $novo_contato = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
    ];
    criar_contato($pdo,$nome_tabela,$novo_contato);
}

if ($_POST){
    cadastrar($pdo,$nome_tabela);
}
?>
