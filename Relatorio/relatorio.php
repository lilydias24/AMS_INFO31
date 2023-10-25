<?php
include("../config.php");
require './dompdf/vendor/autoload.php'; // Composer que carrega o DOM 

date_default_timezone_set('America/Sao_Paulo');
$dt_hrAtual = date('Y-m-d H:i:s');
// Informações no PDF :
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-BR'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<meta name='viewport' content='width=device-width, initial-scale=1'>";
$dados .= "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css' rel='stylesheet'>";
$dados .= "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js'></script>";
$dados .= "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />";
$dados .= "<title>Relatório de Acesso</title>";
$dados .= "</head>";
$dados .= "<BODY class='container-xxl text-center'>";
$dados .= "<h4 class='mt-5 text-center text-success'>Relatório de Registros Solicitados em $dt_hrAtual</h4>";
$dados .= "<hr class='w-50 mx-auto text-success p-2'>";

if (isset($_GET['filtro']) && !empty($_GET['filtro'])) {
    $busca = $_GET['filtro'];
    $consulta = "SELECT * FROM historico AS hist INNER JOIN aluno AS al ON hist.matricula = al.matricula
    INNER JOIN turma AS tur ON tur.ID_turma = al.ID_turma 
    INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico  
    INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
    WHERE al.matricula = $busca ORDER BY hist.ID_historico DESC";
    $resultConsulta = $connect->query($consulta);
    $qtLinhasConsulta = $resultConsulta->num_rows;

    if ($qtLinhasConsulta > 0) {
        $dados .= "<div class='rounded table-responsive text-center m-5'>";
        $dados .= "<table class='table table-light table-hover shadow'>";
        $dados .= "<thead class='table-info'>";
        $dados .= "<tr>";
        $dados .= "<th> Matrícula </th>";
        $dados .= "<th> Nome </th>";
        $dados .= "<th> Turma </th>";
        $dados .= "<th> Status </th>";
        $dados .= "<th> Responsável </th>";
        $dados .= "<th> Data - Hora </th>";
        $dados .= "</tr>";
        $dados .= "</thead>";
        while ($rowCon = $resultConsulta->fetch_object()) {
            $dados .= "<tbody>";
            $dados .= "<tr>";
            $dados .= "<td>" . $rowCon->matricula . "</td>";
            $dados .= "<td>" . $rowCon->nome . "</td>";
            $dados .= "<td>" . $rowCon->nome_turma . "</td>";
            $dados .= "<td>" . $rowCon->descricao . "</td>";
            $dados .= "<td>" . $rowCon->num_responsavel . "</td>";
            $dados .= "<td>" . $rowCon->data_hr . "</td>";  
            $dados .= "</tbody>";
        }
    }
}

$dados .= "<img src='logo.png' style='width:250px;' alt='logo'>";
$dados .= "</body>"; 

use Dompdf\Dompdf; // Nomespace do DOM
$dompdf = new Dompdf();  // Instancia e classe DOM
$dompdf-> loadHtml($dados); // Instancia o loadHtml e envia o conteúdo do PDF
$dompdf->set_option('defaultFont', 'Times New Roman');
$dompdf->setPaper('A4', 'portrait'); // formato | landscape -> Paisagem
$dompdf->render(); // Rendeniza HTML -> PDF
$dompdf->stream(); // Gera o PDF

?>
