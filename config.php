<?php
    $bdHost = "localhost";
    $bdUser = "root";
    $bdPassword = "";
    $dataBase = "tcc"; 
    $connect = mysqli_connect($bdHost, $bdUser, $bdPassword, $dataBase);

    if($connect) {
        return $connect;
    }
    else {
        die("Problemas ao conectar o banco de dados. Erro: " . mysqli_connect_errno() . "" . mysqli_connect_error()); 
        echo mysqli_connect_error();
    }

?>