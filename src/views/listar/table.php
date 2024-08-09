<?php 

function renderTh($value) {
    return '<th>' . htmlspecialchars($value) . '</th>';
}

function renderTd($obj) {
    return '<td>' . htmlspecialchars($obj) . '</td>';
}

function renderTrow($obj, $type) {
    $htmlTds = '';
    foreach ($obj as $value) {
        $htmlTds .= renderTd($value);
    }
    
    $extraElement = "
    <td>
        <div class='d-flex gap-4 justify-content-center'>
            <a href='/editar-{$type}?id={}' class='btn btn-dark'>Editar</a>
            <a href='/remover-{$type}?id={}' class='btn btn-danger'>Remover</a>
        </div>
    </td>";
    $htmlTds .= str_replace('{}',$obj['id'],$extraElement);

    return '<tr>' . $htmlTds . '</tr>';
}

function renderThead($array) {
    $keys = array_keys(reset($array));
    $arrayTh = array_map('renderTh', array_merge($keys,['controles']));
    $htmlTh = implode("", $arrayTh);
    return '<thead><tr>' . $htmlTh . '</tr></thead>';
}

function renderTbody($array, $type) {
    $arrayTrows = array_map(function($obj) use ($type) {
        return renderTrow($obj, $type);
    }, $array);
    
    $htmlTrows = implode("", $arrayTrows);
    return '<tbody>' . $htmlTrows . '</tbody>';
}

function renderTable($array,$type) {
    $thead = renderThead($array);
    $tbody = renderTbody($array,$type);
    return "<table class='container table table-striped text-center border border-black table-hover'>" . $thead . $tbody . "</table>";
}
?>
