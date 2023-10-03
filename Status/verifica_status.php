<?php
include("../config.php");

$sql = "SELECT * FROM status";
$result = $connect->query($sql);
$qtLinhas = $result->num_rows;

if($qtLinhas > 0){
    while($row = $result->fetch_object()){
        if($row->descricao == "Entrada em Atraso"){
            echo "Entrada em Atraso";
        }
        if($row->descricao == "Presente"){
            echo "Presente";
        }
        if($row->descricao == "Ausente"){
            echo "Ausente";
        }
    }
}
?>