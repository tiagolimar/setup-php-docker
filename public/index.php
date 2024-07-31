<?php

$routes = [
    '/listar' => '../src/views/listar/listar.php',
    '/cadastro' => '../src/views/cadastro/cadastro.php',
];

$controller = [
    '/listar' => '../src/controller/listar/listar.php',
    '/cadastro' => '../src/controller/cadastro/cadastro.php',
];

function direcionarRota($routes, $controller) {
    $url = $_SERVER['REQUEST_URI'];
    $naoEncontrado = TRUE;
    
    foreach ($routes as $key => $value) {
        if ($url == $key) {
            include $value;
            include $controller[$key];
            $naoEncontrado = FALSE;
        }
    }
    
    if($naoEncontrado == TRUE) echo 'Página não encontrada';
}

function renderView($routes, $controller){
    include '../src/views/_template/head.php';
    direcionarRota($routes, $controller);
    include '../src/views/_template/footer.php';
}

renderView($routes, $controller);