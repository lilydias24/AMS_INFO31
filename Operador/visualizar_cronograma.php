<?php
include_once("../Login/autenticar.php");
include("../config.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<HEAD>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Bootstrap5/js/bootstrap.min.js"></script> 
    <title>Cronograma de Turmas</title>
</HEAD>

<BODY class="container-xxl" style="background-color: #4dd494 ;">
    <nav class="rounded shadow bg-light mt-3">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><img src="../logo.png" style="width:250px;" alt="logo"></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../operador.php" class="text-decoration-none text-black" aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></button></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="./visualizar_cronograma.php" class="text-decoration-none text-black" aria-current="page">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16"><path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
				</svg></a></button>
			</li>
            <form method="GET" action="" class="form-inline">
				<div class="input-group mt-5 mx-auto">
					<input class="form-control text-center" name="filtro" type="search" aria-label="Search" placeholder="Nome da Turma">
					<div class="input-group-append">
						<button type="submit" class="btn btn-success">
							<svg xmlns="http://www.w3.org/2000/svg" width="25" height="35" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
							</svg>
						</button>
					</div>
				</div>
			</form>
            <li class="nav-item mt-5"><button type="button" class="btn btn-danger"><a href="../Login/sair.php" class="text-decoration-none text-light">Sair</a></button></li>
        </ul>
    </nav>   
    <div class="container-sm mt-5 rounded p-4 text-bg-success text-center">

    <?php
    if (isset($_GET['filtro']) && !empty($_GET['filtro'])) {

    print "<h4> Resultado da Busca</h4>";
    print "<hr>";               			
    $filtro = $_GET['filtro'];

    $sql = "SELECT * FROM cronograma AS cronos INNER JOIN turma AS tur
    ON cronos.ID_turma = tur.ID_turma 
    WHERE tur.nome_turma LIKE '%$filtro%' 
    ORDER BY ID_cronos ASC";
    $result = $connect->query($sql);
    $qtLinhas = $result->num_rows;
    
        if ($qtLinhas > 0) {
            print "<div class='rounded table-responsive text-center m-3'>";
            print "<table class='table table-striped table-info table-hover shadow'>";
            print "<thead class='table-light'>";
            print "<tr>";
            print "<th> Dia da Semana</td>";
            print "<th> Entrada </th>";
            print "<th> Saída </th>";
            print "<th> Turma </td>";
            print "</tr>";
            print "</thead>";
            while ($row = $result->fetch_object()) {
                print "<tbody>";
                print "<tr>";
                print "<td>" . $row->dia_semana . "</td>";
                print "<td>" . $row->hr_entrada . "</td>";
                print "<td>" . $row->hr_saida . "</td>";
                print "<td>" . $row->nome_turma . "</td>";
                print "</tr>";
                print "</tbody>";
            }
            print "</table>";
            print "</div>";
        } else {
            print "<p class='alert alert-danger'>Não Foram Encontrados Resultados!</p>";
        }
    } else {

    print "<h4>Cronogramas de Turmas</h4>";
    print "<hr>";

    $sql = "SELECT * FROM cronograma AS cronos INNER JOIN turma AS tur
    ON cronos.ID_turma = tur.ID_turma ORDER BY ID_cronos ASC";
    $result = $connect->query($sql);
    $qtLinhas = $result->num_rows;

        if ($qtLinhas > 0) {
            print "<div class='rounded table-responsive text-center m-3'>";
            print "<table class='table table-info table-hover shadow'>";
            print "<thead class='table-light'>";
            print "<tr>";
            print "<th> Dia da Semana</td>";
            print "<th> Entrada </th>";
            print "<th> Saída </th>";
            print "<th> Turma </td>";
            print "</tr>";
            print "</thead>";
            while ($row = $result->fetch_object()) {
                print "<tbody>";
                print "<tr>";
                print "<td>" . $row->dia_semana . "</td>";
                print "<td>" . $row->hr_entrada . "</td>";
                print "<td>" . $row->hr_saida . "</td>";
                print "<td>" . $row->nome_turma . "</td>";
                print "</tr>";
                print "</tbody>";
            }
            print "</table>";
            print "</div>";
        } else {
            print "<p class='alert alert-danger'>Não Foram Encontrados Resultados!</p>";
        }
    }
    ?>
    </div>
</BODY>