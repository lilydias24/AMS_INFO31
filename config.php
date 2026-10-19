<?php
    if(!file_exists(__DIR__ . "/config.local.php")) {
        die("Arquivo config.local.php não encontrado. Copie config.local.example.php para config.local.php e preencha.");
    }
    $settings = require __DIR__ . "/config.local.php";

    $bdHost = $settings["db"]["host"];
    $bdUser = $settings["db"]["user"];
    $bdPassword = $settings["db"]["password"];
    $dataBase = $settings["db"]["name"];

    $connect = mysqli_connect($bdHost, $bdUser, $bdPassword, $dataBase);

    if($connect) {
        return $connect;
    } else {
        die("Problemas ao conectar o banco de dados. Erro: " . mysqli_connect_errno() . "" . mysqli_connect_error());
        echo mysqli_connect_error();
    }
?>