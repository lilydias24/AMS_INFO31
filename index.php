<!DOCTYPE HTML>
<HTML lang="pt-BR">
	<HEAD>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="index.css">
		<title> TCC - Início </title>
	</HEAD>
	<BODY class="container-principal"><!-- cabeçalho da página -->
		<header>
			<div class="logo">
				<a href="index.html"><img src="logo.png" alt="logo"></a>
			</div>
			<nav>
				<a href="./Login/login.php" class="action_btn">Entre</a>
			</nav>
		</header><!-- conteudo da página -->
		<h1> Sistema de Monitoramento de Acesso ao Campus IFFar Uruguaiana </h1>
		<section id="banner">
			<img src="IFFar.jpg" alt="banner">
		</section>	
		<div id="openModal" class="modalDialog"> 
			<div>
				<a href="#close" class="close"> X </a>
				<h1> Sobre o Sistema </h1>
				<p><strong> Monitor de Acesso : </strong> 
				Este sistema busca solucionar a dificuldade no monitoramento manual do fluxo de alunos no Iffar Uruguaiana. 
				Através do escaneamento de QR Code/matrícula de cada aluno. Possibilitando segurança e controle no gerenciamento da assistência estudantil, 
				sobre dados do acesso ou egresso de discentes ou pessoas externas as dependencias da instituição.</p>
			</div>
		</div>
		<div id="openModal1" class="modalDialog"> 
			<div>
				<a href="#close" title="Close" class="close"> X </a>
				<h1> Escaner </h1>
				<p> O escaner fará a leitura do código de cada aluno, registrando suas informações no sistema.</p>
			</div>
		</div>
		<div id="openModal2" class="modalDialog"> 
			<div>
				<a href="#close" title="Close" class="close"> X </a>
				<h1> Histórico </h1>
				<p> Será possivel consultar o Histórico em tempo real, do fluxo de docentes no campus do IFFar Uruguaina.
				Possibilitando a geração de relatórios completos - indivuduais ou coletivos - para a gestão da assistência estudantil.
				</p>
			</div>
		</div>
		<footer>
			<div class="footer-text">
				<h3> Sobre o sistema </h3>
				<p> Para entender a proposta do trabalho de conclusão de curso ao desenvolver este sistema : 
				<a href="#openModal">Clique aqui</a>.</p>
			</div>
			<div class="footer-text">
				<h3> Automatização de Entrada/Saída</h3>
				<p> Para saber qual será o novo modo de controle automático : 
				<a href="#openModal1">Clique aqui</a>.</p>
			</div>
			<div class="footer-text">
				<h3> Histórico </h3>
				<p> Para compreender outras vantagens do sistema : 
				<a href="#openModal2">Clique aqui</a>.</p>
			</div>
		</footer>
	</BODY>
</HTML>