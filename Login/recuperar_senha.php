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
                    $mail->Subject = "Recuperar senha de acesso no Sistema de Monitoramento de Acesso - IFFAR UG";

                    $mensagem = "<h3>Olá ". $nome ."</h3>Uma solicitação de recuperação de senha foi realizada no Sistema de Monitoramento de Acesso - IFFAR UG.<br>Sua nova senha é " . $nova_senha . "<br>";

                    $mail->Body = $mensagem;
                    $mail->send();
                    $msg = 2;
                } catch (Exception $e) {
                    echo "Erro ao enviar o email: {$mail->ErrorInfo}";
                }

            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            $msg = 1;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>Recuperar Senha</title>
</head>

<body class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2>Recuperar a Senha</h2>
                    <div class="m-3"><i class="fa-solid fa-lock fa-2xl" style="color: #000000;"></i></div>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($msg)) :
            if ($msg == 1) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    O email fornecido não existe em nosso banco!
                </div>
            <?php } elseif($msg == 2) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Email enviado com sucesso, visualize sua caixa de mensagem!
                </div>
            <?php } endif ?>
        <div class="row">
            <div class="col">
                <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                        <div class="col-xl-12 py-2">
                            <label class="form-label">CPF:</label>
                            <input class="form-control" type="text" name="CPF" class="input" required>
                        </div>
                        <div class="col-xl-12 py-2">
                            <label class="form-label">Nome:</label>
                            <input class="form-control" type="text" name="nome" class="input" required>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Email:</label>
                            <input class="form-control" type="email" name="email" class="input" required>
                        </div>
                        <div class="col-xl-12 py-2">
                            <div class="text-end">
                                <button class="btn link-body-emphasis text-light" type="submit" class="input" name="recuperar">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>