<?php include_once("../Login/autenticar.php"); ?>
<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $ID_turma = $_POST["ID_turma"];
        $dia_semana = array($_POST['seg'], $_POST['ter'], $_POST['qua'], $qui = $_POST['qui'], $_POST['sex']);
        $entrada = array($_POST["hr_entrada1"], $_POST["hr_entrada2"], $_POST["hr_entrada3"], $_POST["hr_entrada4"], $_POST["hr_entrada5"]);
        $saida = array($_POST["hr_saida1"], $_POST["hr_saida2"], $_POST["hr_saida3"], $_POST["hr_saida4"], $_POST["hr_saida5"]);

        for ($i = 0; $i < 5; $i++) {
            $sql = "INSERT INTO cronograma (dia_semana, hr_entrada, hr_saida, ID_turma) 
            VALUES ('{$dia_semana[$i]}', '{$entrada[$i]}', '{$saida[$i]}', '{$ID_turma}')";
            $result = $connect->query($sql) or die($connect->error);
        }

        if ($result == true) {
            print "<script> alert('Cadastro Realizado com Sucesso!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        } else {
            print "<script> alert('Não foi Possível Cadastrar!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
        break;
    case 'editar':
        $ID_cronos = $_POST["ID_cronos"];
        $dia_semana = $_POST['dia_semana'];
        $entrada = $_POST['hr_entrada'];
        $saida = $_POST['hr_saida'];
        $ID_turma = $_POST["ID_turma"];


        $sql = "UPDATE cronograma 
            SET dia_semana='$dia_semana', hr_entrada='$entrada', hr_saida='$saida', ID_turma='$ID_turma' 
            WHERE ID_cronos='$ID_cronos'";
        $result = $connect->query($sql) or die($connect->error);


        if ($result == true) {
            print "<script> alert('Edição Realizada com Sucesso!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        } else {
            print "<script> alert('Não foi Possível Editar!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
        break;
    case 'excluir':
        $sql = "DELETE FROM cronograma WHERE ID_cronos=" . $_REQUEST["ID_cronos"];
        $result = $connect->query($sql) or die($connect->error);

        if ($result == true) {
            print "<script> alert('Exclusão Realizada com Sucesso!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        } else {
            print "<script> alert('Não foi Possível Excluir!'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
        break;
}
?>