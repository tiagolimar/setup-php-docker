<?php

include __DIR__.'/../../controller/_conexao/index.php';

$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$id = str_replace('id=','',$query);

remover_local($pdo, $nome_tabela_local, $id);

redirecionar('/listarLocais');