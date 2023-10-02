<?php
switch($_REQUEST["acao"]){
    case 'cadastrar':
        $nivel = $_POST["nivel"];
        $CPF = $_POST["CPF"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $CPF = str_replace(['.', '-'], '', $CPF); // Remove pontos e traço

        $sql = "INSERT INTO usuario (nivel, CPF, email, senha) 
        VALUES ('{$nivel}', '{$CPF}', '{$email}', '{$senha}')";
        $result = $connect->query($sql) or die($connect->error);

        if($result == true){
            print "<script> alert('Cadastro Realizado com Sucesso!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }else{
            print "<script> alert('Não foi Possível Cadastrar!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
    break;
    case 'editar':
        $nivel = $_POST["nivel"];
        $CPF = $_POST["CPF"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];   

        $sql = "UPDATE usuario 
        SET nivel='$nivel', email='$email', senha='$senha' 
        WHERE CPF='$CPF'";

        $result = $connect->query($sql) or die($connect->error);

        if($result == true){
            print "<script> alert('Edição Realizada com Sucesso!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }else{
            print "<script> alert('Não foi Possível Editar!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }     
    break;
    case 'excluir':
        $sql = "DELETE FROM usuario WHERE CPF=".$_REQUEST["CPF"];

        $result = $connect->query($sql) or die($connect->error);

        if($result == true){
            print "<script> alert('Exclusão Realizada com Sucesso!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }else{
            print "<script> alert('Não foi Possível Excluir!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }     
    break;
}
?>