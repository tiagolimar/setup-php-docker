<?php

$routes = [
    '/' => '../src/views/home.php',
    '/home' => '../src/views/home.php',
    '/listar' => '../src/views/listar/index.php',
    '/cadastro' => '../src/views/cadastro/index.php',
    '/local' => '../src/views/local/index.php',
    '/listarLocais' => '../src/views/local/listar.php',
    '/remover-contato' => '../src/views/remover/index.php',
    '/remover-local' => '../src/views/remover/local.php',
    '/editar-contato' => '../src/views/editar/index.php'
];

$controller = [
    '/cadastro' => '../src/controller/cadastro/index.php',
    '/local' => '../src/controller/local/index.php',
];

function direcionarRota($routes, $controller) {
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $naoEncontrado = TRUE;
    
    foreach ($routes as $key => $value) {
        if ($key == $url) {
            include $value;
            if (array_key_exists($key, $controller)) {
                include $controller[$key];
            }
            $naoEncontrado = FALSE;
            break;
        }
    }
    
    if($naoEncontrado == TRUE) echo 'Página não encontrada';
}

function renderView($routes, $controller){
    include '../src/views/_template/head/index.php';
    direcionarRota($routes, $controller);
    include '../src/views/_template/footer.php';
}

renderView($routes, $controller);