<?php
//verifica se o usuário está logado
session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("Por favor, faça o login!"); window.location.href = "../content/login.php";</script>';
    exit();
} else {
    echo '<script>console.log("Você está logado como ' . $_SESSION["nome"] . '");</script>';
}
