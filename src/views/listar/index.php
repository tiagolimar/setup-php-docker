<h1 class="text-center">Lista de Contatos 📞</h1>

<?php
include 'table.php';
include __DIR__.'/../../controller/_conexao/index.php';

$contatos = ler_contatos($pdo, $nome_tabela);

$contato_padrao = [
    'id' =>'-',
    'nome' => '-',
    'email' => '-',
    'telefone' => '-',
];

if(count($contatos) == 0) {
    $contatos = [$contato_padrao];
} else {
    $contatos = [$contatos];
}

echo renderTable($contatos);
?>

