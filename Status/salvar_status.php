<?php include_once("../Login/autenticar.php"); ?>
<?php
switch($_REQUEST["acao"]){
    case 'cadastrar':
        $descricao = $_POST["descricao"];

        $sql = "INSERT INTO status (descricao) VALUES ('{$descricao}')";
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
        $ID_status = $_POST["ID_status"];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE status
        SET descricao='$descricao'
        WHERE ID_status='$ID_status'";
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
        $sql = "DELETE FROM status WHERE ID_status=".$_REQUEST["ID_status"];
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