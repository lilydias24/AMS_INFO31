<?php
    // Copie este arquivo para config.local.php e preencha com os seus dados.
    // O config.local.php está no .gitignore: credenciais nunca vão para o repositório.
    return [
        "db" => [
            "host" => "localhost",
            "user" => "root",
            "password" => "",
            "name" => "tcc",
        ],
        // Para Gmail, use uma "senha de app" (Conta Google → Segurança → Senhas de app).
        "smtp" => [
            "host" => "smtp.gmail.com",
            "port" => 465,
            "username" => "seu-email@gmail.com",
            "password" => "sua-senha-de-app",
            "from_name" => "Monitoramento de Acesso - IFFAR UG",
        ],
    ];
?>
