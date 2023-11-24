<?php
include("../config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

if (isset($_POST['recuperar'])) {
    $nova_senha = substr(md5(time()), 0, 6);
    $senha_cript = password_hash($nova_senha, PASSWORD_DEFAULT);
    $CPF = mysqli_escape_string($connect, $_POST['CPF']);
    $CPF = str_replace(['.', '-'], '', $CPF);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);

    $sql = "SELECT * FROM usuario WHERE email = '$email' and CPF = '$CPF'";
    $result = $connect->query($sql);

    if ($result == TRUE) {
        if (mysqli_num_rows($result) == 1) {
            $atual = "UPDATE usuario SET senha = '$senha_cript' WHERE email = '$email' and CPF = '$CPF'";
            $resultado = $connect->query($atual);
            if ($resultado == TRUE) {
                try {
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = 'acessMonitoringIFFAR@gmail.com';
                    $mail->Password = '***REMOVIDO***';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    $mail->setFrom('acessMonitoringIFFAR@gmail.com', 'Monitoramento de Acesso - IFFAR UG');
                    $mail->addAddress($email, $nome);
                    $mail->addReplyTo('acessMonitoringIFFAR@gmail.com');

                    $mail->IsHTML(true);
                    $mail->CharSet = "UTF-8";
                    $mail->Subject = "Recuperar Senha - Sistema de Monitoramento de Acesso - IFFAR UG";

                    $mensagem = "<h3>Olá " . $nome . "</h3>Uma solicitação de recuperação de senha foi realizada no Sistema de Monitoramento de Acesso - IFFAR UG.<br>Sua nova senha é " . $nova_senha . "<br>";

                    $mail->Body = $mensagem;
                    $mail->send();
                    $msg = "<script> alert('Email Enviado com Sucesso! Realize seu Login com a Nova Senha.'); </script>" . "<script> location.href='login.php'; </script>";
                    print $msg;
                } catch (Exception $e) {
                    echo "Erro ao enviar o email: {$mail->ErrorInfo}";
                }
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
             $msg = "<script> alert('Dados não Encontrados no Sistema!'); </script>" . "<script> location.href='recuperar_senha.php'; </script>";
             print $msg;
        }
    } else {
        echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <title>Recuperar Senha</title>
</head>

<body class="container mt-5" style="background: linear-gradient(to right top, #065917, #0c6d25, #108233, #129743, #10ad53, #00b56d, #00bc84, #00c39a, #00bbb1, #00b0c2, #00a4cb, #0097cb);
background-size:cover; background-repeat: no-repeat; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-3 mt-3">
                <div class="text-center">
                    <button type="button" class="btn btn-outline-success"><a href="login.php" class="text-decoration-none text-black" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16"><path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg></a></button>
                    <h4 class="mt-2">Recuperar a Senha</h4>
                    <hr>
                </div>
                <form class="card-form text-center" method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group m-3">
                        <label class="form-label">CPF:</label>
                        <input class="form-control mx-auto text-center mt-2" type="text" name="CPF" id="CPF" placeholder="Informe seu CPF" required>
                    </div>
                    <div class="form-group m-3">
                        <label class="form-label">Nome:</label>
                        <input class="form-control mx-auto text-center mt-2" type="text" name="nome" placeholder="Informe seu Nome" required>
                    </div>
                    <div class="form-group m-3">
                        <label class="form-label">Email:</label>
                        <input class="form-control mx-auto text-center mt-2" type="text" name="email" placeholder="Informe seu Email" required>
                    </div>
                    <button class="btn text-bg-primary mt-3 p-2 w-25" type="submit" name="recuperar">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#CPF').inputmask({
            mask: '999.999.999-99',
        });
    });
</script>
</html>