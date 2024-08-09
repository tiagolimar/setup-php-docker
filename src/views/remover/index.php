<?php

include __DIR__.'/../../controller/_conexao/index.php';

$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$id = str_replace('id=','',$query);

remover_contato($pdo, $nome_tabela, $id);

redirecionar('/listar');