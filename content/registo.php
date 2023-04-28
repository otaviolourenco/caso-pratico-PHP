<?php
session_start();
include('db_connect.php');

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    // Verifica se o e-mail já está registrado
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($query);
    if (mysqli_num_rows($resultado) == 0) {

        // Criptografa a senha
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        // Insere o novo usuário no banco de dados
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if ($conn->query($query)) {
            // Redireciona para a página de login
            echo '<script>alert("Você se registou, faça login!"); window.location.href = "login.php"; </script>';

            exit();
        } else {
            echo "Erro ao registrar usuário: " . $conn->error;
        }
    } else {
        echo "O e-mail já está registrado. Por favor, utilize outro e-mail.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Este é um site com os projetos e informações do web developer Martin Doe">
    <meta name="author" content="Otávio Lourenço">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/effects.css">
    <link rel="stylesheet" href="../CSS/magnific-popup.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon.png" />

    <script src="https://kit.fontawesome.com/c6aa19193c.js" crossorigin="anonymous"></script>

    <title>Martin Doe - Registe-se</title>
</head>

<body>
    <div id="formRegisto">
        <form action="registo.php" method="POST" id="formulario">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome"><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email"><br>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha"><br>

            <input type="submit" class="my-btn" value="Registar"><br>
            <a href="login.php">Login</a>
        </form>
    </div>

    <ul class="background">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</body>

</html>