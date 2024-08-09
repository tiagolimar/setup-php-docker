<?php
include __DIR__.'/../_conexao/index.php';

function cadastrar($pdo, $nome_tabela_local) {
    $novo_local = [
        'local' => $_POST['local'],
    ];
    
    criar_local($pdo, $nome_tabela_local, $novo_local);
}

if ($_POST){
    cadastrar($pdo, $nome_tabela_local);
    redirecionar('/listarLocais');
}
?>
