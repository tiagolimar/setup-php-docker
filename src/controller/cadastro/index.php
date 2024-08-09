<?php
include __DIR__.'/../_conexao/index.php';

function cadastrar($pdo, $nome_tabela) {
    $novo_contato = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'data_cadastro' => $_POST['data_cadastro'],
        'telefone' => $_POST['telefone'],
    ];
    
    criar_contato($pdo, $nome_tabela, $novo_contato);
}

if ($_POST){
    cadastrar($pdo, $nome_tabela);
    redirecionar('/listar');
}
?>
