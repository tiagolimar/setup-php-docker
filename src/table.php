<?php 

function renderTh ($value){
    $th = '<th>'.$value.'</th>';
    return $th;
}

function renderTd ($obj){
    $htmlTd = '<td>'.$obj.'</td>';
    return $htmlTd;
}

function renderTrow ($obj){
    $keys = array_keys($obj);
    $htmlTds = '';

    for ($i=0; $i < count($keys); $i++){
        $htmlTd = '<td>'.$obj[$keys[$i]].'</td>';
        $htmlTds .= $htmlTd;
    }

    $htmlTrow = '<tr>'.$htmlTds.'</tr>';
    return $htmlTrow;
}

function renderThead ($array){
    $keys = array_keys($array[0]);
    $arrayTh = array_map('renderTh', $keys);
    $htmlTh = implode("",$arrayTh);
    $thead = '<thead><tr>'.$htmlTh.'</tr></thead>';
    return $thead;
}

function renderTbody ($array){
    $arrayTrows = array_map('renderTrow', $array);
    $htmlTrows = implode("",$arrayTrows);
    $htmlTbody = '<tbody>'.$htmlTrows.'</tbody>';
    return $htmlTbody;
}

function renderTable ($array){
    $thead = renderThead($array);
    $tbody = renderTbody($array);
    $htmlTable = "<table class='table table-striped text-center border border-black table-hover'>".$thead.$tbody."</table>";
    return $htmlTable;
}

include "../src/people.php"

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Table</title>
</head>
<body>
    <div class="container border border-black rounded rounded-4 shadow mb-5 overflow-scroll w-75">
        <h2 class="text-center">Lista de Nomes</h2>
        <?php
            echo renderTable($people);
        ?>
    </div>
</body>
</html>