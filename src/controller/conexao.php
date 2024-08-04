<?php

$pdo = new PDO('mysql:host=setup-mysql;dbname=db_name', 'user', 'password');
$nome_tabela = 'tb_contatos';

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    criar_tabela();
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}

function criar_tabela(){
    global $pdo, $nome_tabela;
    $colunas = [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'nome VARCHAR(100) NOT NULL',
        'email VARCHAR(100) NOT NULL',
        'telefone VARCHAR(20)'
    ];
    
    $sql = "CREATE TABLE IF NOT EXISTS {$nome_tabela} ({implode(', ', $colunas)})";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        echo "Erro ao criar a tabela: " . $e->getMessage();
    }
}

function criar_contato($contato){
    global $pdo, $nome_tabela;

    try {
        $colunas = implode(', ', array_keys($contato));
        $valores = implode(', ', array_map(function($c){return ':'.$c},array_values($contato)));

        $sql = "INSERT INTO tabela ({$colunas}) VALUES ({$valores})";
        $stmt = $pdo->prepare($sql);    
        $stmt->execute();

        echo "Novo registro criado com sucesso";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function ler_contatos() {
    global $pdo;
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