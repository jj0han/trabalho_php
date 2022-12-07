<?php
$server = "mysql:host=localhost;dbname=conteudos";
$user = "root";
$password = "";

try {
    $pdo = new PDO($server, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo("Conexão realizada com sucesso!");
} catch (PDOException $e) {
    echo("Não foi possível se conectar ao banco de dados...");
}
?>