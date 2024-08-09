<h1 class="text-center">Lista de Locais</h1>

<?php

include __DIR__.'/../listar/table.php';
include __DIR__.'/../../controller/_conexao/index.php';

$locais = ler_locais($pdo, $nome_tabela_local);

echo renderTable($locais,'local');