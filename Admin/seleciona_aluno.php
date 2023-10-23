<?php

include("../config.php");

$busca = $_POST['filtro'];
$consulta = "SELECT * FROM historico AS hist INNER JOIN aluno AS al ON hist.matricula = al.matricula
INNER JOIN turma AS tur ON tur.ID_turma = al.ID_turma 
INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico  
INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
WHERE al.matricula = $busca AND hist.ID_historico = (SELECT MAX(ID_historico) 
FROM historico WHERE matricula = $busca)";
$resultConsulta = $connect->query($consulta);
$qtLinhasConsulta = $resultConsulta->num_rows;

if ($qtLinhasConsulta > 0) {
    print "<div class='rounded table-responsive text-center m-5'>";
    print "<table class='table table-light table-hover shadow'>";
    print "<thead class='table-info'>";
    print "<tr>";
    print "<th> Matrícula </th>";
    print "<th> Nome </th>";
    print "<th> Turma </th>";    
    print "<th> Status </th>";
    print "<th> Responsável </th>";
    print "<th> Data - Hora </th>";
    print "<th> Autorizar </th>";
    print "</tr>";
    print "</thead>";
    while($rowCon = $resultConsulta->fetch_object()) {
        print "<tbody>";
        print "<tr>";
        print "<td>" . $rowCon->matricula . "</td>";
        print "<td>" . $rowCon->nome . "</td>";
        print "<td>" . $rowCon->nome_turma . "</td>";        
        print "<td>" . $rowCon->descricao . "</td>";
        print "<td>" . $rowCon->num_responsavel . "</td>";
        print "<td>" . $rowCon->data_hr . "</td>";        
        print "<form action='justificar_saida.php' method='POST'>";
        print "<input type='hidden' name='filtro' value='$rowCon->matricula'>";
        print "<td><button class='btn text-decoration-none' type='submit'>
        <a href='justificar_saida.php' class='text-decoration-none text-success'>
        <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-bookmark-check-fill' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z'/>
        </svg></button></a></td>";
        print "</form>";   
        print "</tr>";
        print "</tbody>";
    }
    print "</table>";
    print "</div>";
} else {
    print "<p class='alert alert-danger text-center m-3'>Não Foraram Encontrados Resultados!</p>";
}
?>