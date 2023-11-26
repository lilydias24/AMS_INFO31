<?php 
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['CPF']) && !empty($_POST['senha']))
    {
        include_once('../config.php');
        $CPF = $_POST['CPF'];
        $CPF = str_replace(['.', '-'], '', $CPF);
        $senha = $_POST['senha'];
        
        $sql = "SELECT * FROM usuario WHERE CPF = '$CPF'";
        $result = $connect->query($sql);
        
        if($result == true){
            $login = $result->fetch_object();
            $senhaCriptografada = $login->senha;
            $verifica = password_verify($senha, $senhaCriptografada);

            if($login == true && $verifica == true){
                // Senha válida
                if($login->nivel == 'admin'){
                    $_SESSION['CPF'] = $CPF;
                    $_SESSION['senha'] = $senha;
                    header('Location: ../admin.php');
                } 
                elseif($login->nivel == 'operador') {
                    $_SESSION['CPF'] = $CPF;
                    $_SESSION['senha'] = $senha;
                    header('Location: ../operador.php');
                }
            } else {
                print "<script> alert('Senha Inválida!'); </script>";
                print "<script> location.href='./login.php'; </script>";
            }
        } else {
            print "<script> alert('Usuário Não Encontrado!'); </script>";
            print "<script> location.href='./login.php'; </script>";
        }
    } else {
        print "<script> alert('Dados de Login Incompletos!'); </script>";
        print "<script> location.href='./login.php'; </script>";
    }
?>
