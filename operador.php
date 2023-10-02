<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['nivel']) == true) and (!isset($_SESSION['CPF']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nivel']);
        unset($_SESSION['CPF']);
        unset($_SESSION['senha']);
        header('Location: ./Login/login.php');
    }
    $logado = $_SESSION['CPF'];
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<HEAD>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
	<title> Início_Operador </title>
</HEAD>
<BODY class="container-xxl" style="background-color: #4dd494 ;"> 
	<nav class="rounded shadow bg-light mt-3">
		<ul class="nav nav-pills nav-justified">
			<li class="nav-item"><a href="./index.html" class="navbar-brand float-start"><img src="./logo.png" class="img-fluid" style="width:250px;" alt="logo"></a>
			<li class="nav-item mt-5 active"><button type="button" class="btn btn-outline-success"><a href="operador.php" class="text-decoration-none text-black">
			<svg xmlns="http://www.w3.org/2000/svg" width="40" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></button></li>
			<li class="nav-item mt-5"><button type="button" class="btn btn-danger"><a href="./Login/sair.php" class="text-decoration-none text-light">Sair</a></button></li>
		</ul>
	</nav>
	<div class="container-xxl mt-4 text-center">    
    <div class="alert alert-success mx-auto w-50">
        <?php echo "<h6>Bem Vindo! <u>$logado</u></h6>"; ?>
    </div>
        <div class="row">
            <div class="col-md-4"><a href="./QRcode/index.php" class="text-decoration-none">
                <div class="card shadow m-3 text-bg-success p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="25" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16"><path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                    </svg><br>
                    <p>Escanear</p>
                </div>
            </div></a>
            <div class="col-md-4"><a href="./QRcode/historico.php" class="text-decoration-none">
                <div class="card shadow m-3 text-bg-success p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg><br>
                    <p>Visualizar Histórico</p>
                </div>
            </div></a>
            <div class="col-md-4"><a href="#" class="text-decoration-none">
                <div class="card shadow m-3 text-bg-success p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="25" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16"><path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/><path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                    </svg><br>
                    <p>Visualizar Cronogramas</p>
                </div>
            </div></a>
		</div>
	</div>
</BODY> 
</HTML>