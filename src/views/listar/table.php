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
    $extraElement = '
    <td>
        <div class="d-flex gap-4">
            <button id_user="{}" class="btn btn-dark-outline">Editar</button>
            <button id_user="{}" class="btn btn-danger-outline">Remover</button>
        </div>
    </td>';

    $keys = array_keys($obj);
    $htmlTds = '';

    for ($i=0; $i < count($keys); $i++){
        $htmlTd = '<td>'.$obj[$keys[$i]].'</td>';
        $htmlTds .= $htmlTd;
    }

    // $htmlTds .= str_replace('{}',$obj['id'],$extraElement);

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

?>