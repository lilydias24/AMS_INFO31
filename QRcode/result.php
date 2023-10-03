<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>Escaner - QR Code</title>		
</head>		
<BODY class="container-xxl" style="background-color: #79dfa5;">
    <nav class="rounded shadow bg-light mt-3">
		<ul class="nav nav-pills nav-justified">
        <li class="nav-item"><a href="./index.html" class="float-start"><img src="../logo.png" style="width:250px;" alt="logo"></a></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../operador.php" class="text-decoration-none text-black" aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></button></li>
			<li class="nav-item mt-5"><a href="./index.php" class="text-decoration-none btn btn-outline-success">Escaner</a></li>
			<li class="nav-item mt-5"><a href="#" class="text-decoration-none btn btn-outline-success">Cronograma</a></li>
			<li class="nav-item mt-5"><button type="button" class="btn btn-danger"><a href="../Login/sair.php" class="text-decoration-none text-light">Sair</a></button></li>
		</ul>
	</nav>
    <div class="container-sm rounded mt-5 p-4 text-bg-success text-center" style="width: 50%;">
        <?php

        include("../config.php");

        $comanda = $_GET['comanda'];
        date_default_timezone_set('America/Sao_Paulo');
        $dt_hrAtual = date('Y-m-d H:i:s');

        $sql = "SELECT * FROM aluno";
        $result = $connect->query($sql);
        $qtLinhas = $result->num_rows;

        if($qtLinhas > 0){
            while($row = $result->fetch_object()){
                if($comanda == $row->matricula)
                {
                    $sql = "INSERT INTO historico (data_hr, matricula) VALUE ('{$dt_hrAtual}', '{$comanda}')";
                    $result = $connect->query($sql) or die($connect->error);
                    // Se escaneado a mesma matrícula mais de uma vez aparece como "entrada duplicada"
                    // Criar modal com resultado, foto e status  
                    // Criar ligação de tabelas para o histórico
                    // Fazer fluxo de status                
                    // arrumar o cronograma e lista-lo no lado do operador
                    echo json_encode($comanda);

                    if($result == true){
                        print "<script> alert('Acesso registrado com Sucesso!'); </script>";
                        print "<script> location.href='registro.php'; </script>";
                    }else{
                        print "<script> alert('Não foi Possível Registrar o Acesso!'); </script>";
                        print "<script> location.href='historico.php'; </script>";
                    }
                }
            }
        }
        ?>
    </div>
</BODY>