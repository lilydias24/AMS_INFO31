<?php include_once("../Login/autenticar.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<HEAD>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Bootstrap5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>   
    <title>Gerenciar Turmas</title>
</HEAD>
<BODY class="container-xxl" style="background-color: #79dfa5;">
    <nav class="rounded bg-light mt-3">
        <ul class="nav nav-pills nav-justified"> 
            <li class="nav-item"><a href="#" class="float-start"><img src="../logo.png" style="width:250px;" alt="logo"></a></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../admin.php" class="text-decoration-none text-black" aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></button></li>
        </ul>
    </nav>
    <div class="row mt-5 text-center">
        <div class="col">
            <a href="?page=novo" class="text-decoration-none">
                <div class="card shadow m-5 text-bg-success p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="25" margin-left="25" fill="currentColor" class="bi bi-person-plus"  viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg><br>
                    <p>Cadastrar Turma</p>
                </div>
            </a>
        </div> 
        <div class="col">
            <a href="?page=listar" class="text-decoration-none">
                <div class="card shadow m-5 text-bg-success p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="25" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                    </svg><br>
                    <p>Lista de Turmas</p>
                </div>
            </a>
        </div>
    </div>
    <div class="container-sm text-bh-light">
        <div class="row">
            <?php
            include("../config.php");
                switch(@$_REQUEST["page"]){
                case "novo" :
                    include("novo_turma.php");
                    break;
                case "listar": 
                    include("listar_turma.php");
                    break;
                case "salvar" :
                    include("salvar_turma.php");
                    break;
                case "editar" :
                    include("editar_turma.php");
                    break;
                default :
                print "<br>" ;
                }
            ?>
        </div>
    </div>
</BODY>
</html>