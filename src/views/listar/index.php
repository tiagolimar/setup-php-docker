<h1 class="text-center">Lista de Contatos 📞</h1>

<?php
include 'table.php';
include __DIR__.'/../../controller/_conexao/index.php';

$contatos = ler_contatos($pdo, $nome_tabela);

echo renderTable($contatos,'contato');
?>

