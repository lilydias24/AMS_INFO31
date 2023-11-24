<?php include_once("../Login/autenticar.php"); ?>
<?php
switch($_REQUEST["acao"]){
    case 'cadastrar':
        $matricula = $_POST["matricula"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $num_responsavel = $_POST["num_responsavel"];
        $foto = $_FILES["foto"];
        $ID_turma = $_POST["ID_turma"];
        
        if(isset($_FILES['foto']))
        {
            $tipo = strtolower(substr($_FILES['foto']['name'], -3)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i") . "." . $tipo; //Definindo um novo nome para o arquivo
            $dir = './fotos/'; //Diretório para uploads
    
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            echo '<div class="alert alert-success" role="alert" align="center">
                <img src="./fotos/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"> 
                </div>';
            $foto = $new_name;
        } 

        $sql = "INSERT INTO aluno (matricula, nome, email, num_responsavel, foto, ID_turma) 
        VALUES ('{$matricula}', '{$nome}', '{$email}', '{$num_responsavel}', '{$foto}', '{$ID_turma}')";
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
        $matricula = $_POST["matricula"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $num_responsavel = $_POST["num_responsavel"];
        $foto = $_FILES["foto"];
        $ID_turma = $_POST["ID_turma"];

        if(isset($_FILES['foto']))
        {
            $tipo = strtolower(substr($_FILES['foto']['name'], -3)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i") . $tipo; //Definindo um novo nome para o arquivo
            $dir = './fotos/'; //Diretório para uploads
    
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            echo '<div class="alert alert-success" role="alert" align="center">
                <img src="./fotos/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"> 
                </div>';
            $foto = $new_name ;
        } 

        $sql = "UPDATE aluno
        SET matricula='$matricula', nome='$nome', email='$email', num_responsavel='$num_responsavel', foto='$foto', ID_turma='$ID_turma' 
        WHERE matricula='$matricula'";
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
        $sql1 = "SELECT * FROM aluno WHERE matricula=".$_REQUEST["matricula"];
        $test = $connect->query($sql1) or die($connect->error);
        while($row = $test->fetch_object()){
            if(isset($row->foto))
            {
                 unlink("../Aluno/fotos/$row->foto"); 
            } 
        }
        $sql = "DELETE FROM aluno WHERE matricula=".$_REQUEST["matricula"];
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