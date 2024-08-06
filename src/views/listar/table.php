<?php 

function renderTh($value) {
    return '<th>' . htmlspecialchars($value) . '</th>';
}

function renderTd($obj) {
    return '<td>' . htmlspecialchars($obj) . '</td>';
}

function renderTrow($obj) {
    $htmlTds = '';
    foreach ($obj as $value) {
        $htmlTds .= renderTd($value);
    }
    
    $extraElement = '
    <td>
        <div class="d-flex gap-4 justify-content-center">
            <button id="{}" class="btn btn-dark">Editar</button>
            <button id="{}" class="btn btn-danger">Remover</button>
        </div>
    </td>';
    $htmlTds .= str_replace('{}',$obj['id'],$extraElement);

    return '<tr>' . $htmlTds . '</tr>';
}

function renderThead($array) {
    $keys = array_keys(reset($array));
    $arrayTh = array_map('renderTh', array_merge($keys,['controles']));
    $htmlTh = implode("", $arrayTh);
    return '<thead><tr>' . $htmlTh . '</tr></thead>';
}

function renderTbody($array) {
    $arrayTrows = array_map('renderTrow', $array);
    $htmlTrows = implode("", $arrayTrows);
    return '<tbody>' . $htmlTrows . '</tbody>';
}

function renderTable($array) {
    $thead = renderThead($array);
    $tbody = renderTbody($array);
    return "<table class='container table table-striped text-center border border-black table-hover'>" . $thead . $tbody . "</table>";
}
?>
