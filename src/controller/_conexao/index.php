<?php
include 'contatos.php';
$nome_tabela = 'tb_contatos';

try {
    $pdo = new PDO('mysql:host=setup-mysql;dbname=db_name', 'user', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    criar_tabela($pdo, $nome_tabela);
    criar_contatos_padrao($pdo, $nome_tabela, $contatos_padrao);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}

function criar_tabela($pdo, $nome_tabela){
    $colunas = [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'nome VARCHAR(100) NOT NULL',
        'email VARCHAR(100) NOT NULL',
        'telefone VARCHAR(20)'
    ];
    
    $sql_colunas = implode(', ', $colunas);
    $sql = "CREATE TABLE IF NOT EXISTS {$nome_tabela} ({$sql_colunas})";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        echo "Erro ao criar a tabela: " . $e->getMessage();
    }
}

function criar_contatos_padrao($pdo, $nome_tabela, $contatos_padrao){
    foreach ($contatos_padrao as $contato) {
        criar_contato($pdo, $nome_tabela, $contato);
    }
}

function criar_contato($pdo, $nome_tabela, $contato){

    try {
        $colunas = implode(', ', array_keys($contato));
        $valores = implode(', ', array_map(function($c){return ':'.$c;},array_keys($contato)));

        $sql = "INSERT INTO {$nome_tabela} ({$colunas}) VALUES ({$valores})";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute($contato);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function ler_contatos($pdo, $nome_tabela) {
    $sql = "SELECT * FROM {$nome_tabela};";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $contatos = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($contatos) {
            return $contatos;
        } else {
            echo "Sem contatos aqui.";
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar usuário: " . $e->getMessage();
    }
}