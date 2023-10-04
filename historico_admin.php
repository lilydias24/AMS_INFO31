<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>Histórico</title>		
</head>		
<BODY class="container-xxl" style="background-color: #79dfa5;">
<nav class="rounded bg-light mt-3">
        <ul class="nav nav-pills nav-justified"> 
            <li class="nav-item"><a href="../admin.php" class="float-start"><img src="logo.png" style="width:250px;" alt="logo"></a></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="admin.php" class="text-decoration-none text-black" aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></button></li>
        </ul>
    </nav>
	<div class="container-sm rounded p-2 mt-5 text-center text-success">
		<h4>Histórico de Acessos</h4>
		<hr>
		<?php
		    include("config.php");

            /*$sql = "SELECT * FROM aluno AS al INNER JOIN turma AS tur ON al.ID_turma = tur.ID_turma
            INNER JOIN historico AS hist ON al.matricula = hist.matricula
            INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico 
            INNER JOIN status AS stts ON inf.ID_status = inf.ID_status";*/
                    // Criar ligação de tabelas para o histórico (informa)

            $sql = "SELECT * FROM aluno AS al INNER JOIN historico AS hist ON al.matricula = hist.matricula";
			$result = $connect->query($sql);
			$qtLinhas = $result->num_rows;

			if($qtLinhas > 0){
				print "<div class='rounded table-responsive text-center m-3'>";
				print "<table class='table table-info table-hover shadow'>";
				print "<thead class='table-light'>";				  
				print "<tr>";
				print "<th> Data - Hora </th>";             
				print "<th> Status </th>";
				print "<th> Nome </th>";
				print "<th> Matrícula </th>";
				print "<th> Turma </th>";
				print "</tr>"; 
				print "</thead>"; 
				while($row = $result->fetch_object()){
				print "<tbody>"; 
				print "<tr>";
				print "<td>" . $row->data_hr . "</td>";
				//print "<td>" . $row->ID_status . "</td>";
				print "<td>" . $row->nome . "</td>";
				print "<td>" . $row->matricula . "</td>";
				//print "<td>" . $row->ID_Turma . "</td>";
				print "</tr>";
				print "</tbody>";   
				}
				print "</table>";
				print "</div>";
			} else {
				print "<p class='alert alert-danger'>Não Foraram Encontrados Resultados!</p>";
			}
		?>
	</div>
</BODY>