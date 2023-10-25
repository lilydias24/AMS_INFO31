<?php include_once("../Login/autenticar.php");    ?>
<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Buscar Registro</title>
</head>

<BODY class="container-xxl text-center" style="background-color: #79dfa5;">
    <nav class="rounded bg-light mt-3">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a href="#" class="float-start"><img src="../logo.png" style="width:250px;" alt="logo"></a></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../admin.php" class="text-decoration-none text-black" aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                </svg></a></button></li>
        </ul>
    </nav>
    <h4 class="mt-5 text-center text-success">Buscar Registro</h4>
    <hr class="w-50 mx-auto text-success p-2">
    <form method="POST" class="form-inline" action="">
        <div class="input-group mt-3 mx-auto shadow" style="width: 35%;">
            <input class="form-control text-center" name="filtro" type="search" aria-label="Search" placeholder="Informe o que deseja buscar">
            <div class="input-group-append">
                <button class="btn btn-success" name="buscar" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="35" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg> Buscar
                </button>
            </div>
        </div>
    </form>
</BODY>
<?php
include("../config.php");

if (isset($_POST['filtro']) && !empty($_POST['filtro'])) {
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
        print "<th> Gerar Relatório</th>";
        print "</tr>";
        print "</thead>";
        while ($rowCon = $resultConsulta->fetch_object()) {
            print "<tbody>";
            print "<tr>";
            print "<td>" . $rowCon->matricula . "</td>";
            print "<td>" . $rowCon->nome . "</td>";
            print "<td>" . $rowCon->nome_turma . "</td>";
            print "<td>" . $rowCon->descricao . "</td>";
            print "<td>" . $rowCon->num_responsavel . "</td>";
            print "<td>" . $rowCon->data_hr . "</td>";
            print "<td><a href='relatorio.php'><button type='button' class='btn btn-success''>
            <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-file-text-fill' viewBox='0 0 16 16'><path d='M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z'/>
            </svg></button></a></td>";
            print "</tr>";
            print "</tbody>";
        }
        print "</table>";
        print "</div>";
    } else {
        print "<p class='alert alert-danger text-center m-3'>Não Foraram Encontrados Resultados!</p>";
    }
}
?>