<?php
include __DIR__.'/../_conexao/index.php';

function cadastrar($pdo, $nome_tabela) {
    $novo_contato = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
    ];

    $novo_contato['data_cadastro'] = date('Y-m-d');
    
    criar_contato($pdo, $nome_tabela, $novo_contato);
}

if ($_POST){
    cadastrar($pdo, $nome_tabela);
    redirecionar('/listar');
}
?>
