<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Justificar Saída</title>
</head>

<BODY class="container-xxl" style="background-color: #79dfa5;">
    <nav class="rounded bg-light mt-3">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a href="#" class="float-start"><img src="../logo.png" style="width:250px;" alt="logo"></a></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../admin.php" class="text-decoration-none text-black" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                        </svg></a></button></li>
        </ul>
    </nav>
    <div class="container-sm rounded mt-5 p-4 text-bg-success text-center w-50">
        <h4>Saída Autorizada</h4>
        <hr>
        <?php
        include_once("../Login/autenticar.php");
        include("../config.php");

        $busca = $_POST['filtro'];
        $consulta = "SELECT * FROM historico AS hist 
        INNER JOIN aluno AS al ON hist.matricula = al.matricula
        INNER JOIN turma AS tur ON tur.ID_turma = al.ID_turma 
        INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico  
        INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
        WHERE al.matricula = $busca AND hist.ID_historico = (SELECT MAX(ID_historico) 
        FROM historico WHERE matricula = $busca)";
        $resultConsulta = $connect->query($consulta);
        $qtLinhasConsulta = $resultConsulta->num_rows;
        //var_dump($consulta);
        //var_dump($resultConsulta);
        //var_dump($qtLinhasConsulta);
        if ($qtLinhasConsulta > 0) :
            $rowCon = $resultConsulta->fetch_object(); ?>
            <form action="" method="POST">
                <div class="m-3">
                    <label class="h5 mt-3">Matrícula :</label>
                    <input type="number" name="matricula" value="<?php print $rowCon->matricula; ?>" readonly class="form-control text-center w-50 mx-auto">
                </div>
                <div class="m-3">
                    <label class="h5 mt-3">Motivo da Saída :</label>
                    <input type="text" name="motivo" class="form-control text-center w-50 mx-auto">
                </div>
                <button type="submit" class="btn btn-info text-center mt-3" name="autorizar" >Autorizar Saída</button>
            </form>
        <?php endif; ?>
        <?php
        //$ID_status = 10 && $descricao = "Saída Autorizada";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['autorizar'])) {
                $sql = "UPDATE informa SET ID_status = 10
                        WHERE ID_historico = (SELECT MAX(ID_historico) 
                        FROM historico WHERE matricula = $busca)";
                $result = $connect->query($sql) or die($connect->error);
                if ($result == true) {
                    print "<script> alert('Saída Autorizada com Sucesso!'); </script>";
                    print "<script> location.href='autorizar_aluno.php'; </script>";
                } else {
                    print "<script> alert('Não foi Possível Autorizar a Saída!'); </script>";
                    print "<script> location.href='autorizar_aluno.php'; </script>";
                }
            }
        }
        ?>
    </div>
</BODY>