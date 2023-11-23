<?php
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['CPF']) && !empty($_POST['senha']) )
    {
        include_once('../config.php');
        $CPF = $_POST['CPF'];
        $CPF = str_replace(['.', '-'], '', $CPF); 
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuario WHERE CPF = '$CPF' and senha = '$senha'";
        $result = $connect->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            //print_r('Usuário não encontrado no sistema');
            unset($_SESSION['CPF']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        } else {
            while($login = $result->fetch_object())
            {
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
            }
        }
    } else {
        header('Location: login.php');
    }


    /*
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
            
            print_r($login);
            print_r($verifica);

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
            }
        } else {
            print "<script> alert('Usuário Não Encontrado!'); </script>";
        }
    } else {
        print "<script> alert('Dados de Login Incompletos!'); </script>";
    }
    ?>
    */
?>