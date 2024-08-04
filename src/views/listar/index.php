<h1 class="text-center" >Lista de Contatos 📞</h1>

<?php
include 'table.php';
include 'people.php';
include '../../controller/conexao.php';

$contatos = ler_contatos();
echo renderTable($contatos);
?>
