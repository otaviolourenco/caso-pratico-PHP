<?php
// Conecta ao banco de dados
$host = "localhost";
$usuario = "root";
$senha = "Mudar@123";
$dbname = "autenticacao";

$conn = new mysqli($host, $usuario, $senha, $dbname);

//checar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
