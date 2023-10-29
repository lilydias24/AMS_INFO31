<?php
include_once("../Login/autenticar.php");  

include("../config.php");

$busca = $_GET['filtro'];
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
    while ($rowCon = $resultConsulta->fetch_object()) {
        print "<tbody>";
        print "<tr>";
        print "<td>" . $rowCon->matricula . "</td>";
        print "<td>" . $rowCon->nome . "</td>";
        print "<td>" . $rowCon->nome_turma . "</td>";
        print "<td>" . $rowCon->descricao . "</td>";
        print "<td>" . $rowCon->num_responsavel . "</td>";
        print "<td>" . $rowCon->data_hr . "</td>";
        print "<td><button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal'>
        <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-bookmark-check-fill' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z'/>
        </svg></button></td>";
        print "</tr>";
        print "</tbody>";
    }
    print "</table>";
    print "</div>";
} else {
    print "<p class='alert alert-danger text-center m-3'>Não Foraram Encontrados Resultados!</p>";
}
?>
<div class="modal-fullscreen-md-down">
    <div class="modal fade text-center mx-auto" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-bg-success">
                <div class="modal-header">
                    <h4 class="modal-title m-2" id="exampleModalLabel">Autorizar Saída</h4>
                    <hr>
                    <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="" method="POST">
                            <label class="h5 mt-3">Matrícula :</label>
                            <input type="number" name="matricula" value="<?php print $busca; ?>" readonly class="form-control text-center w-50 mx-auto">
                            <label class="h5 mt-3">Motivo da Saída :</label>
                            <input type="text" name="motivo" class="form-control text-center w-50 mx-auto" required>
                            <button type="submit" name="autorizar" class="btn btn-info btn-lg m-3 mt-3">Autorizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['autorizar'])) {
        date_default_timezone_set('America/Sao_Paulo');
        $dt_hrAtual = date('Y-m-d H:i:s');

        $matricula = $busca;
        $motivo = $_POST["motivo"];

        $sql = "INSERT INTO historico (data_hr, matricula, motivo) VALUES ('{$dt_hrAtual}', '{$matricula}', '{$motivo}')";
        $result = $connect->query($sql) ;

        if ($result == true) {
            print "<script> alert('Saída Autorizada com Sucesso!'); </script>";
            print "<script> location.href='historico_admin.php'; </script>";
            
            $sql2 = "SELECT * FROM historico ORDER BY ID_historico DESC";
            $result2 = $connect->query($sql2);
            $rowR2 = $result2->fetch_object();

            $ID_historico = $rowR2->ID_historico;
            $ID_status = 10;
            //$ID_status = 10 && $descricao = "Saída Autorizada";
            $sql3 = "INSERT INTO informa (ID_historico, ID_status) VALUES ('{$ID_historico}', '{$ID_status}')";
            $result3 = $connect->query($sql3);
        } else {
            print "<script> alert('Não foi Possível Autorizar a Saída!'); </script>";
            print "<script> location.href='buscar_aluno.php'; </script>";
        }
    }
}
?>