<?php
session_start();
include('db_connect.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($query);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['user_id'] = $usuario['user_id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nivel_acesso'] = $usuario['nivel_acesso'];
            header('Location: portal.php');
        } else {
            header('Location: login.php?erro=1');
        }
    } else {
        header('Location: login.php?erro=1');
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

    <title>Martin Doe - Login</title>
</head>

<body>
    <div id="formLogin">
        <form action="login.php" id="formulario" method="POST">

            <p id="errorMsg" style="display: none;">Os dados estão incorretos!</p>

            <label for="email">Email</label>
            <input type="email" name="email"><br>

            <label for="senha">Senha</label>
            <input type="password" name="senha"><br>

            <input type="submit" class="my-btn" value="Entrar"> <br>
            <a href="registo.php">Registar</a>
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