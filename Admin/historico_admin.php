<?php 	
include_once("../Login/autenticar.php");
include("../config.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Bootstrap5/js/bootstrap.min.js"></script>  
    <title>Histórico</title>		
</head>		
<BODY class="container-xxl" style="background-color: #79dfa5;">
	<nav class="rounded bg-light mt-3">
        <ul class="nav nav-pills nav-justified"> 
            <li class="nav-item"><a href="#" class="float-start"><img src="../logo.png" style="width:250px;" alt="logo"></a></img></li>
			<li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="historico_admin.php" class="text-decoration-none text-black" aria-current="page">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16"><path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
				</svg></a></button>
			</li>
			<form method="GET" action="" class="form-inline">
				<div class="input-group mt-5 mx-auto">
					<input class="form-control text-center" name="filtro" type="search" aria-label="Search" placeholder="Nome do Aluno">
					<div class="input-group-append">
						<button type="submit" class="btn btn-success">
							<svg xmlns="http://www.w3.org/2000/svg" width="25" height="35" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
							</svg>
						</button>
					</div>
				</div>
			</form>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../admin.php" class="text-decoration-none text-black" aria-current="page">
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
				</svg></a></button>
			</li>
        </ul>
    </nav>
	<div class="container-sm rounded p-2 mt-5 text-center text-success">
	<?php  
	if (isset($_GET['filtro']) && !empty($_GET['filtro'])) {

        print "<h4> Resultado da Busca</h4>";
        print "<hr>";               			
			$filtro = $_GET['filtro'];
			$busca = "SELECT * FROM historico AS hist 
			INNER JOIN aluno AS al ON hist.matricula = al.matricula
			INNER JOIN turma AS tur ON al.ID_turma = tur.ID_turma
			INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico  
			INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
			WHERE al.nome LIKE '%$filtro%' AND hist.ID_historico = (SELECT MAX(ID_historico) 
			FROM historico WHERE al.matricula)";
			$resultFiltro = $connect->query($busca);
			$qtLinhasFiltro = $resultFiltro->num_rows; 
			
			if ($qtLinhasFiltro > 0) {
			print "<div class='rounded table-responsive text-center'>";
			print "<table class='table table-light table-hover shadow'>";
			print "<thead class='table-info'>";
			print "<tr>";
			print "<th> Matrícula </th>";
			print "<th> Nome </th>";
			print "<th> Turma </th>";
			print "<th> Responsável </th>";
			print "<th> Status </th>";
			print "<th> Data - Hora </th>";
			print "</tr>";
			print "</thead>";
			while ($rowFil = $resultFiltro->fetch_object()) {
				print "<tbody>";
				print "<tr>";
				print "<td>" . $rowFil->matricula . "</td>";
				print "<td>" . $rowFil->nome . "</td>";
				print "<td>" . $rowFil->nome_turma . "</td>";
				print "<td>" . $rowFil->num_responsavel . "</td>";
				print "<td>" . $rowFil->descricao . "</td>";
				print "<td>" . $rowFil->data_hr . "</td>";
				print "</tr>";
				print "</tbody>";
				}
				print "</table>";
				print "</div>";
			} else {
				print "<p class='alert alert-danger text-center m-3'>Não Foraram Encontrados Resultados!</p>";
			}
		} else {
		
		print "<h4>Histórico de Acessos</h4>";
		print "<hr>";
		
            $consulta = "SELECT * FROM informa AS inf INNER JOIN historico AS hist ON inf.ID_historico = hist.ID_historico
            INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
            INNER JOIN aluno AS al ON hist.matricula = al.matricula
			INNER JOIN turma AS tur ON al.ID_turma = tur.ID_turma ORDER BY hist.ID_historico DESC"; 
            $resultConsulta = $connect->query($consulta);
            $qtLinhasConsulta = $resultConsulta->num_rows; 
			
			if($qtLinhasConsulta > 0){
				print "<div class='rounded table-responsive text-center m-3'>";
				print "<table class='table table-info table-hover shadow'>";
				print "<thead class='table-light'>";				  
				print "<tr>";				
				print "<th> ID histórico </th>";
				print "<th> Data - Hora </th>";             
				print "<th> Status </th>";
				print "<th> Matrícula </th>";				
				print "<th> Nome </th>";
				print "<th> Turma </th>";
				print "</tr>"; 
				print "</thead>"; 
				while($rowCon = $resultConsulta->fetch_object()){
				print "<tbody>"; 
				print "<tr>";				
				print "<td>" . $rowCon->ID_historico . "</td>";
				print "<td>" . $rowCon->data_hr . "</td>";
				print "<td>" . $rowCon->descricao . "</td>";
				print "<td>" . $rowCon->matricula . "</td>";
				print "<td>" . $rowCon->nome . "</td>";
				print "<td>" . $rowCon->nome_turma . "</td>";				
				print "</tr>";
				print "</tbody>";   
				}
				print "</table>";
				print "</div>";
			} else {
				print "<p class='alert alert-danger'>Não Foraram Encontrados Resultados!</p>";
			}
		}
		?>
	</div>
</BODY>