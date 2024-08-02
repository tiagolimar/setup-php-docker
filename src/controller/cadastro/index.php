<?php



function cadastrar() {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    echo $nome, $email, $telefone;
}

if ($_POST){
    cadastrar();
}
?>
