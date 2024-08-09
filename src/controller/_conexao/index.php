<?php
include 'contatos.php';
include 'locais.php';
$nome_tabela = 'tb_contatos';
$nome_tabela_local = 'tb_locais';

try {
    $pdo = new PDO('mysql:host=setup-mysql;dbname=db_name', 'user', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    criar_tabela($pdo, $nome_tabela);
    criar_tabela_local($pdo, $nome_tabela_local);
    criar_contatos_padrao($pdo, $nome_tabela, $contatos_padrao);
    criar_locais_padrao($pdo, $nome_tabela_local, $locais_padrao);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}

function criar_tabela($pdo, $nome_tabela){
    $colunas = [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'nome VARCHAR(100) NOT NULL',
        'email VARCHAR(100) NOT NULL UNIQUE',
        'data_cadastro VARCHAR(20) NOT NULL',
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

function criar_tabela_local($pdo, $nome_tabela_local){
    $colunas = [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'local VARCHAR(100) NOT NULL',
    ];
    
    $sql_colunas = implode(', ', $colunas);
    $sql = "CREATE TABLE IF NOT EXISTS {$nome_tabela_local} ({$sql_colunas})";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        echo "Erro ao criar a tabela: " . $e->getMessage();
    }
}

function criar_contatos_padrao($pdo, $nome_tabela, $contatos_padrao){
    $contatos = ler_contatos($pdo, $nome_tabela);
    if (count($contatos) == 0) {
        foreach ($contatos_padrao as $contato) {
            criar_contato($pdo, $nome_tabela, $contato);
        }
    }
}

function criar_locais_padrao($pdo, $nome_tabela_local, $locais_padrao){
    $locais = ler_locais($pdo, $nome_tabela_local);
    if (count($locais) == 0) {
        foreach ($locais_padrao as $local_padrao) {
            criar_local($pdo, $nome_tabela_local, $local_padrao);
        }
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
        $contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($contatos) {
            return $contatos;
        } else {
            return [];
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar usuário: " . $e->getMessage();
    }
}

function ler_locais($pdo, $nome_tabela_local) {
    $sql = "SELECT * FROM {$nome_tabela_local};";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $locais = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($locais) {
            return $locais;
        } else {
            return [];
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar usuário: " . $e->getMessage();
    }
}

function remover_contato($pdo, $nome_tabela, $id) {
    $sql = "DELETE FROM {$nome_tabela} WHERE id='{$id}';";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao buscar usuário: " . $e->getMessage();
    }
}

function remover_local($pdo, $nome_tabela_local, $id) {
    $sql = "DELETE FROM {$nome_tabela_local} WHERE id='{$id}';";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao buscar usuário: " . $e->getMessage();
    }
}

function criar_local($pdo, $nome_tabela_local, $novo_local){
    try {
        $colunas = implode(', ', array_keys($novo_local));
        $valores = implode(', ', array_map(function($c){return ':'.$c;},array_keys($novo_local)));

        $sql = "INSERT INTO {$nome_tabela_local} ({$colunas}) VALUES ({$valores})";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($novo_local);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function redirecionar($url){
    echo "<script>window.location.href = '{$url}';</script>";
}