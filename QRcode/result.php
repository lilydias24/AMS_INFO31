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

    $verif = "SELECT * FROM aluno WHERE matricula=". $comanda;
    $resultado = $connect->query($verif);
    $qtLinhas = $resultado->num_rows;

    if($qtLinhas > 0) : 
        while($row = $resultado->fetch_object()) : ?>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Registro </button>
            <?php
            $consulta = "SELECT * FROM historico AS hist INNER JOIN aluno AS al ON hist.matricula = al.matricula
            INNER JOIN turma AS tur ON tur.ID_turma = al.ID_turma 
            INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico 
            INNER JOIN status AS stts ON inf.ID_status = inf.ID_status"; 
            $resultConsulta = $connect->query($consulta);
            $qtLinhasConsulta = $resultConsulta->num_rows; 
            
            if($qtLinhasConsulta > 0) :
                if($rowCon = $resultConsulta->fetch_object()) :  

                    $teste = "SELECT * FROM cronograma WHERE ID_turma=". $rowCon->ID_turma;
                    $resultTeste = $connect->query($teste);
                    $qtLinhasTeste = $resultTeste->num_rows;

                    if($qtLinhasTeste > 0) {
                        while($rowTeste = $resultTeste->fetch_object()){

                            $dia = date('D');
                            date_default_timezone_set('America/Sao_Paulo');
                            $hora = date("H:i:s"); 
                            //puxando a hora 2 vezes ?
                            if($rowTeste->dia_semana == $dia){

                                if(($rowTeste->hr_entrada == '08:00:00') && ($hora >= '07:00:00' && $hora <= '08:15:00') 
                                or ($rowTeste->hr_entrada == '13:30:00') && ($hora >= '12:30:00' && $hora <= '13:45:00'))
                                {                                   
                                    $rowCon->ID_status = 6;
                                    $rowCon->descricao = "Presente";                                    
                                } 
                                elseif(($rowTeste->hr_entrada == '08:00:00') && ($hora >= '08:15:00' && $hora <= '10:00:00')
                                or ($rowTeste->hr_entrada == '13:30:00') && ($hora >= '13:45:00' && $hora <= '15:30:00'))
                                {                                    
                                    $rowCon->ID_status = 4;
                                    $rowCon->descricao = "Entrada em Atraso";                                    
                                } 
                                else 
                                {
                                    if(($rowTeste->hr_saida == '11:35:00' && $hora >= '11:20:00') 
                                    or ($rowTeste->hr_saida == '12:25:00' && $hora >= '12:00:00')
                                    or ($rowTeste->hr_saida == '17:10:00' && $hora >= '17:00:00'))
                                    {
                                        $rowCon->ID_status = 8;
                                        $rowCon->descricao = "Ausente";
                                    } 
                                    else
                                    {
                                        print "<script class='alert alert-danger'> alert('Saída de Aluno NÃO autorizada!'); </script>";
                                        print "<script> location.href='index.php'; </script>";                                        
                                    }        
                                }              
                            }
                        }
                    }
                    ?>
                    <div class="modal-fullscreen-md-down">
                        <div class="modal fade text-center mx-auto" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content text-bg-success">
                                <div class="modal-header">
                                    <h4 class="modal-title m-2" id="exampleModalLabel">Acesso Solicitado</h4>
                                    <hr>
                                    <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-0">
                                        <div class="col-md-5">
                                            <img src="../Aluno/fotos/2023.08.29-01.46.jpg" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-7 ">                                                
                                            <h5 class="card-title">  
                                            <p><?php print $rowCon->nome . "<br>" ; ?></p> 
                                            <p><?php print "Matrícula : " . $rowCon->matricula . "<br>"; ?></p> 
                                            <p><?php print "Turma : " . $rowCon->nome_turma . "<br>"; ?></p> 
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mt-3 h5"> <?php print "Status : " . $rowCon->descricao . "<br>"; ?> </p>
                                        <p class="card-text"><small class="text-body-secondary"><?php print "Data/Hora de Acesso : " . $hora . "<br>"; ?></small></p>
                                    </div>
                                    <form action="" method="POST">
                                        <a href="index.php"><button type="submit" name="OK" value="registrar" class="btn btn-outline-info btn-lg m-3 mt-3">OK</button></a>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php endif; ?>         
                <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if (isset($_POST['OK'])) {

                        $sql = "INSERT INTO historico (data_hr, matricula) VALUES ('{$dt_hrAtual}', '{$comanda}')";
                        $result = $connect->query($sql) ;

                        if($result == true){
                        print "<script> alert('Acesso Realizado com Sucesso!'); </script>";
                        print "<script> location.href='index.php'; </script>";
                        } else {
                        print "<script> alert('Não foi Possível Registrar o Acesso!'); </script>";
                        print "<script> location.href='#'; </script>";
                        }

                        $sql2 = "SELECT * FROM historico ORDER BY ID_historico DESC";
                        $result2 = $connect->query($sql2);
                        $rowR2 = $result2->fetch_object();

                        $ID_historico = $rowR2->ID_historico;
                        $ID_status = $rowCon->ID_status;

                        $sql4 = "INSERT INTO informa (ID_historico, ID_status) VALUES ('{$ID_historico}', '{$ID_status}')";
                        $result4 = $connect->query($sql4);
                    }
                }
                ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>        
  </div>
</BODY>
</html>