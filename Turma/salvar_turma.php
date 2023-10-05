<?php
switch($_REQUEST["acao"]){
    case 'cadastrar':
        $nome_turma = $_POST["nome_turma"];
        
        $sql = "INSERT INTO turma (nome_turma) VALUE ('{$nome_turma}')";
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
        $ID_turma = $_POST["ID_turma"];
        $nome_turma = $_POST["nome_turma"];

        $sql = "UPDATE turma
        SET nome_turma='$nome_turma'
        WHERE ID_turma='$ID_turma'";
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
        $sql = "DELETE FROM turma WHERE ID_turma=".$_REQUEST["ID_turma"];
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