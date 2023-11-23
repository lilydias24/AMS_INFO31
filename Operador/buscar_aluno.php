<?php
// update status do aluno no histórico para entrada autorizada
?>

<?php include_once("../Login/autenticar.php");    ?>
<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Autorizar Entrada</title>
</head>

<BODY class="container-xxl text-center" style="background-color: #4dd494 ;">
    <nav class="rounded shadow bg-light mt-3">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><img src="../logo.png" style="width:250px;" alt="logo"></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../operador.php" class="text-decoration-none text-black" aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></button></li>
            <li class="nav-item mt-5"><a href="../QRcode/index.php" class="text-decoration-none btn btn-outline-success">Escaner</a></li>
            <li class="nav-item mt-5"><a href="./historico.php" class="text-decoration-none btn btn-outline-success">Histórico</a></li>
            <li class="nav-item mt-5"><a href="./visualizar_cronograma.php" class="text-decoration-none btn btn-outline-success">Cronogramas</a></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-danger"><a href="../Login/sair.php" class="text-decoration-none text-light">Sair</a></button></li>
        </ul>
    </nav>   
    <h4 class="mt-5 text-center text-success">Autorizar Entrada de Aluno</h4>
    <hr class="w-50 mx-auto text-success p-2">
    <form method="GET" class="form-inline">
        <div class="input-group mt-3 mx-auto shadow" style="width: 35%;">
            <input class="form-control text-center" name="filtro" type="search" aria-label="Search" placeholder="Informe a Matrícula do Aluno">
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
if (isset($_GET['filtro']) && !empty($_GET['filtro'])) {
    include_once("autorizar_aluno.php");
}
?>