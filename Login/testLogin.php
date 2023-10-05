<?php
    session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['nivel']) && !empty($_POST['CPF']) && !empty($_POST['senha']) )
    {
        // Acesso concedido
        include_once('../config.php');
        $nivel = $_POST['nivel'];
        $CPF = $_POST['CPF'];
        $CPF = str_replace(['.', '-'], '', $CPF); // Remove pontos e traço
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuario WHERE nivel = '$nivel' and CPF = '$CPF' and senha = '$senha'";
        $result = $connect->query($sql);
        //print_r($sql);
        //print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            //print_r('Não existe este usuario no banco');
            unset($_SESSION['nivel']);
            unset($_SESSION['CPF']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        } else {
                if($nivel == 'admin'){
                //print_r('Usuario encontrado no banco');
                $_SESSION['nivel'] = $nivel;
                $_SESSION['CPF'] = $CPF;
                $_SESSION['senha'] = $senha;
                header('Location: ../admin.php');
            } else {
                $_SESSION['nivel'] = $nivel;
                $_SESSION['CPF'] = $CPF;
                $_SESSION['senha'] = $senha;
                header('Location: ../operador.php');
            }
        }
    } else {
        header('Location: login.php');
    }
?>