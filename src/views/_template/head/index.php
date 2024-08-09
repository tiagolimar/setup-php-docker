<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php include 'style.php' ?>
    <title>App</title>
</head>
<body class="container" style="background-color: #EFEFEF">
    <h1 class="mt-3 text-center">📞Contatos📞</h1>
    <nav class="navbar navbar-expand bg-dark-subtle border-top border-bottom border-black pt-2 pb-2 mt-2 mb-2">
        <div class="container-fluid w-100">
            <ul class="navbar-nav flex-row justify-content-center w-100">
                <li class="nav-item text-center"><a class="nav-link fs-4" href="/">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Contatos
                    </a>
                    <ul class="dropdown-menu bg-secondary-subtle">
                        <li class="nav-item text-center"><a class="nav-link fs-5" href="/listar">Listar</a></li>
                        <hr>
                        <li class="nav-item text-center"><a class="nav-link fs-5" href="/cadastro">Criar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Locais
                    </a>
                    <ul class="dropdown-menu bg-secondary-subtle">
                        <li class="nav-item text-center"><a class="nav-link fs-5" href="/listarLocais">Listar</a></li>
                        <hr>
                        <li class="nav-item text-center"><a class="nav-link fs-5" href="/local">Criar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <?php include 'script.php' ?>
