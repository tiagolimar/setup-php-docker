<?php

$pdo = new PDO('mysql:host=setup-mysql;dbname=db_name', 'user', 'password');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}


function createTable(){
    $colunas = ['id','nome','idade','telefone','cidade'];
    // $sql = "CREATE TABLE IF NOT EXISTS usuarios (id INT AUTO_INCREMENT PRIMARY KEY, nome

}

function createContact(){
    try {
        $sql = "INSERT INTO tabela (coluna1, coluna2) VALUES (:valor1, :valor2)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':valor1', $valor1);
        $stmt->bindParam(':valor2', $valor2);
    
        $valor1 = 'Algum valor';
        $valor2 = 'Outro valor';
    
        $stmt->execute();

        echo "Novo registro criado com sucesso";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}