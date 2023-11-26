<?php
include_once("../Login/autenticar.php");
include("../config.php");
require './dompdf/vendor/autoload.php'; // Composer que carrega o DOM 

date_default_timezone_set('America/Sao_Paulo');
$dt_hrAtual = date('d-m-Y H:i:s');
// Informações no PDF :
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-BR'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<meta name='viewport' content='width=device-width, initial-scale=1'>";
$dados .= "<title>Relatório de Acesso</title>";
$dados .= "<img src='logo.png'>";
$dados .= "<style>
h4 { text-align : center;   font-size : 20px;   color : darkgreen; }
img { width:250px; }
table, th, td { border: 1px solid;   padding: 2px; }
table { width: 100%;   border-collapse: collapse; }
th { height: 30px;   background-color: #caffcadc; }
td { text-align: center;   height: 30px; }
</style>";
$dados .= "</head>";
$dados .= "<BODY>";
$dados .= "<h4>Relatório de Acessos - Solicitado em $dt_hrAtual</h4>";
$dados .= "<hr>";


if (isset($_GET['filtro']) && !empty($_GET['filtro'])) {

    if (isset($_GET['data_inicio']) && isset($_GET['data_final']) && !empty($_GET['data_inicio']) && !empty($_GET['data_final'])) {
        $busca = $_GET['filtro'];
        $data_inicio = $_GET['data_inicio'];
        $data_final = $_GET['data_final'];
        $consulta = "SELECT * FROM historico AS hist INNER JOIN aluno AS al ON hist.matricula = al.matricula
        INNER JOIN turma AS tur ON tur.ID_turma = al.ID_turma 
        INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico  
        INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
        WHERE al.matricula = $busca AND hist.data_hr BETWEEN '$data_inicio' AND '$data_final' ORDER BY hist.data_hr DESC";
        $resultConsulta = $connect->query($consulta);
        $qtLinhasConsulta = $resultConsulta->num_rows;

        if ($qtLinhasConsulta > 0) {
            $dados .= "<div class='container'>";
            $dados .= "<table>";
            $dados .= "<thead>";
            $dados .= "<tr>";
            $dados .= "<th> Matrícula </th>";
            $dados .= "<th> Nome </th>";
            $dados .= "<th> Turma </th>";
            $dados .= "<th> Status </th>";
            $dados .= "<th> Responsável </th>";
            $dados .= "<th> Data - Hora </th>";
            //$dados .= "<th> Motivo </th>";
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
                //$dados .= "<td>" . $rowCon->motivo . "</td>";  
                $dados .= "</tbody>";
            }
            $dados .= "</table>";
        }
    } else {
        $busca = $_GET['filtro'];
        $consulta = "SELECT * FROM historico AS hist INNER JOIN aluno AS al ON hist.matricula = al.matricula
        INNER JOIN turma AS tur ON tur.ID_turma = al.ID_turma 
        INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico  
        INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
        WHERE al.matricula = $busca ORDER BY hist.data_hr DESC";
        $resultConsulta = $connect->query($consulta);
        $qtLinhasConsulta = $resultConsulta->num_rows;

        if ($qtLinhasConsulta > 0) {
            $dados .= "<div class='container'>";
            $dados .= "<table>";
            $dados .= "<thead>";
            $dados .= "<tr>";
            $dados .= "<th> Matrícula </th>";
            $dados .= "<th> Nome </th>";
            $dados .= "<th> Turma </th>";
            $dados .= "<th> Status </th>";
            $dados .= "<th> Responsável </th>";
            $dados .= "<th> Data - Hora </th>";
            //$dados .= "<th> Motivo </th>";
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
                //$dados .= "<td>" . $rowCon->motivo . "</td>";  
                $dados .= "</tbody>";
            }
            $dados .= "</table>";
        }
    } 
} elseif (isset($_GET['data_inicio']) && isset($_GET['data_final']) && 
    !empty($_GET['data_inicio']) && !empty($_GET['data_final'])) {
        
    $data_inicio = $_GET['data_inicio'];
    $data_final = $_GET['data_final'];
    $consulta = "SELECT * FROM historico AS hist INNER JOIN aluno AS al ON hist.matricula = al.matricula
    INNER JOIN turma AS tur ON tur.ID_turma = al.ID_turma 
    INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico  
    INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
    WHERE hist.data_hr BETWEEN '$data_inicio' AND '$data_final' ORDER BY hist.data_hr DESC";
    $resultConsulta = $connect->query($consulta);
    $qtLinhasConsulta = $resultConsulta->num_rows;
    if ($qtLinhasConsulta > 0) {
        $dados .= "<div class='container'>";
        $dados .= "<table>";
        $dados .= "<thead>";
        $dados .= "<tr>";
        $dados .= "<th> Matrícula </th>";
        $dados .= "<th> Nome </th>";
        $dados .= "<th> Turma </th>";
        $dados .= "<th> Status </th>";
        $dados .= "<th> Responsável </th>";
        $dados .= "<th> Data - Hora </th>";
        //$dados .= "<th> Motivo </th>";
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
            //$dados .= "<td>" . $rowCon->motivo . "</td>";  
            $dados .= "</tbody>";
        }
        $dados .= "</table>";
    }
} 

$dados .= "<br>";
$dados .= "</body>"; 
$dados .= "</html>"; 

use Dompdf\Dompdf; // Nomespace do DOM
use Dompdf\Options; // Nomespace do DOM
$options = new Options();
$options->set('chroot',realpath(''));
$dompdf = new Dompdf($options);  // Instancia e classe DOM
$dompdf-> loadHtml($dados); // Instancia o loadHtml e envia o conteúdo do PDF
$dompdf->set_option('defaultFont', 'Times New Roman');
$dompdf->setPaper('A4', 'portrait'); // formato | landscape -> Paisagem
$dompdf->render(); // Rendeniza HTML -> PDF
$dompdf->stream('Relatório_IFFar'); // Gera o PDF

?>
