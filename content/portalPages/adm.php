<?php
session_start();
include('../functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['formPostgem'])) {
        postagem();
    } else if (isset($_POST['formProj'])) {
        enviarProjetosDB();
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
    <link rel="stylesheet" href="../CSS/portalstyle.css">
    <link rel="stylesheet" href="../CSS/effects.css">
    <link rel="stylesheet" href="../CSS/magnific-popup.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon.png" />

    <script src="https://kit.fontawesome.com/c6aa19193c.js" crossorigin="anonymous"></script>

    <title>Martin Doe - Meu portal</title>
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 p-2">
                <div class="glass p-4 d-block">
                    <h2>Projetos</h2>
                    <form action="portalPages/adm.php" method="POST" enctype="multipart/form-data">
                        <label for="infoProject">Informações do projeto: </label>
                        <textarea name="infoProject" class="projInputs" cols="30" rows="10"></textarea><br>

                        <label for="tecnoProject" class="mt-3">Tecnologias: </label><br>
                        <input type="text" class="pt-3 projInputs" name="tecnoProject"><br>

                        <label for="dataProject">Data:</label>
                        <input type="date" name="dataProject" class="m-3 p-2 dateForm"><br>

                        <label for="tipoProj">Tipo de projeto: </label>
                        <select name="tipoProj">
                            <option value="">-- Selecionar --</option>
                            <option value="1">Landing Page</option>
                            <option value="2">portifolio</option>
                            <option value="3">ecommerce</option>
                        </select><br>

                        <label for="imageProject" class="my-btn2 mt-3"><i class="fa-solid fa-images"></i> Selecionar imagem </label>
                        <input type="file" class="d-none" name="imageProject" id="imageProject"><br>

                        <button class="my-btn mt-2" type="submit" name="formProj">Enviar</button>

                    </form>
                </div>
            </div>

            <div class="col-sm-6 p-2">
                <div class="glass p-4 d-block">
                    <h2>Projetos</h2>
                    <label for="projectSelect">Selecione o projeto: </label>

                    <?php include('../db_connect.php');

                    $sql = "SELECT * FROM projetos";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        echo "<select name='projeto' onchange='carregarProjeto()'>";
                        echo "<option value=''>-- Selecionar projeto --</option>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['projeto_ID'] . "'>" . $row['foto_proj'] . "</option>";
                        }
                        echo "</select>";
                    } else {
                        echo "0 resultados";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 p-2">
                <div class="glass">
                    <h2>Notícias</h2>
                    <form action="portalPages/adm.php" method="POST">

                        <input type="text" class="projInputs text-center" name="postTitulo" id="postTitulo" placeholder="Título"><br>

                        <label for="postConteudo" class="mt-3">Conteúdo</label><br>
                        <textarea name="postConteudo" class="projInputs" id="postConteudo" cols="50" rows="20"></textarea><br>

                        <label for="postAutor" class="mt-3">Autor</label><br>
                        <input type="text" class="projInputs w-25 text-center" name="postAutor" value="<?php echo $_SESSION['nome']; ?>"><br>

                        <button class="my-btn my-4" type="submit" name="formPostgem">Enviar</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

    <script src="../../JS/jquery.magnific-popup.min.js"></script>
    <script src="../../JS/jquery.js"></script>

</body>

</html>