<?php
//include('db_protect.php');
include('db_connect.php');


function atualizarNome()
{
    include('db_connect.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_name = $_POST['new_name'];

        $new_name = mysqli_real_escape_string($conn, $new_name);

        $stmt = $conn->prepare("UPDATE usuarios SET nome=? WHERE user_id = ?");
        $stmt->bind_param("si", $new_name, $_SESSION['user_id']);
        $stmt->execute();

        $stmt->close();

        echo '<script>alert("O nome foi alterado, faça login novamente!"); window.location.href = "../login.php"; </script>';
        session_destroy();
    }
}

function atualizarSenha()
{
    include('db_connect.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_psw = $_POST['new_psw'];

        $new_psw = mysqli_real_escape_string($conn, $new_psw);

        $stmt = $conn->prepare("UPDATE usuarios SET senha=? WHERE user_id = ?");
        $stmt->bind_param("si", password_hash($new_psw, PASSWORD_DEFAULT), $_SESSION['user_id']);
        $stmt->execute();
        $stmt->close();

        session_destroy();

        echo '<script>alert("A senha foi alterada, faça login novamente!"); window.location.href = "../login.php"; </script>';
    }
}

function postagem()
{
    include('db_connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os valores dos campos do formulário
        $titulo = $_POST["postTitulo"];
        $conteudo = $_POST["postConteudo"];
        $autor = $_POST["postAutor"];
        date_default_timezone_set("Europe/Lisbon");
        $data = date('Y-m-d H:i');

        $titulo = mysqli_real_escape_string($conn, $titulo);
        $conteudo = mysqli_real_escape_string($conn, $conteudo);
        $autor = mysqli_real_escape_string($conn, $autor);

        // Prepara a instrução SQL para inserir os dados na tabela "noticias"
        $sql = "INSERT INTO noticias (titulo, conteudo, autor, data_post) VALUES ('$titulo', '$conteudo', '$autor', '$data')";

        // Executa a instrução SQL
        if ($conn->query($sql) == TRUE) {
            echo '<script>alert("Post enviado com sucesso!"); window.location.href = "../portal.php"; </script>';
        } else {
            echo "Erro ao cadastrar notícia: " . $conn->error;
        }
    }
}

function feedback()
{
    include('db_connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userFeedback = $_SESSION['nome'];
        $feedback = $_POST['feedForm'];

        $feedback = mysqli_real_escape_string($conn, $feedback);

        $sql = "INSERT INTO feedbacks (usuario, feedback) values ('$userFeedback','$feedback')";
        // Executa a instrução SQL
        if ($conn->query($sql) == TRUE) {
            echo '<script>alert("Feedback enviado com sucesso!"); </script>';
        } else {
            echo "Erro ao enviar feedback: " . $conn->error;
        }
    }
}

function agendarReuniao()
{
    include('db_connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userAgend = $_SESSION['nome'];
        $data_agend = $_POST['agendForm'];

        // Verifica se já existe um agendamento para essa data
        $query = "SELECT * FROM agendamento WHERE data_agend = '$data_agend'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo '<script>alert("Horario não disponível."); </script>';
        } else {
            // Insere o agendamento no banco de dados
            $sql = "INSERT INTO agendamento (data_agend, usuario) values ('$data_agend', '$userAgend')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Seu pedido de reunião foi submetido. Aguarde a confirmação."); </script>';
            } else {
                echo "Erro ao agendar reuniões: " . $conn->error;
            }
        }
    }
}

function enviarArquivos()
{
    include('db_connect.php');

    if (isset($_FILES['foto-perfil'])) {

        $arquivo = $_FILES['foto-perfil'];

        if ($arquivo['error'] > 0) {
            echo '<script>alert("Erro ao enviar arquivo."); </script>';
        }

        if ($arquivo['size'] > 4194304) {
            echo '<script>alert("O arquivo muito grande."); </script>';
        }

        $caminho = __DIR__ . '/uploads/';
        $arquivoNome = $arquivo['name'];
        $extensao = strtolower(pathinfo($arquivoNome, PATHINFO_EXTENSION));

        if ($extensao == 'jpg' || $extensao == 'png') {

            $novoNome = uniqid();
            $path = $caminho . $novoNome . '.' . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $path);
            $pathRel = str_replace(__DIR__, '', $path);

            $conn->query("UPDATE usuarios SET foto = '$pathRel' WHERE user_id = {$_SESSION['user_id']}") or die($conn->error);
            echo '<script>alert("Arquivo enviado com sucesso!"); window.location.href = "../portal.php"; </script>';
        } else {
            echo '<script>alert("Arquivo inválido."); </script>';
        }
    }
}

function enviarProjetosDB()
{
    include('db_connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $infoProj = $_POST['infoProject'];
        $tecnoProj = $_POST['tecnoProject'];
        $dataProj = $_POST['dataProject'];
        $tipoProj = $_POST['tipoProj'];

        if (isset($_FILES['imageProject'])) {

            $imgProj = $_FILES['imageProject'];

            if ($imgProj['error'] > 0) {
                echo '<script>alert("Erro ao enviar arquivo."); </script>';
            }

            if ($imgProj['size'] > 4194304) {
                echo '<script>alert("O arquivo muito grande."); </script>';
            }

            $caminho = __DIR__ . '/uploads/';
            $arquivoNome = $imgProj['name'];
            $extensao = strtolower(pathinfo($arquivoNome, PATHINFO_EXTENSION));

            if ($extensao == 'jpg' || $extensao == 'png') {
                $novoNome = uniqid();
                $path = $caminho . $novoNome . '.' . $extensao;
                move_uploaded_file($imgProj['tmp_name'], $path);
                $pathRel = str_replace(__DIR__, '', $path);
            }
        }


        $infoProj = mysqli_real_escape_string($conn, $infoProj);
        $tecnoProj = mysqli_real_escape_string($conn, $tecnoProj);

        $sql = "INSERT INTO projetos (info_proj, tecnologia_proj, data_proj, foto_proj, tipo_proj) VALUES ('$infoProj', '$tecnoProj', '$dataProj', '$pathRel', $tipoProj)";

        if ($conn->query($sql) == TRUE) {
            echo '<script>alert("Projeto enviado com sucesso!"); window.location.href = "../portal.php";</script>';
        } else {
            echo "Erro ao enviar projeto: " . $conn->error;
        }
    }
}

function enviarMensagens()
{
    include('db_connect.php');

    $remetente_nome = $_SESSION['nome'];

    // Obter o destinatário, o assunto e a mensagem do formulário
    $destinatario_nome = $_POST['destinatario'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Inserir a mensagem no banco de dados
    $sql = "INSERT INTO mensagens (remetente_nome, destinatario_nome, assunto, mensagem) VALUES ('$remetente_nome', '$destinatario_nome', '$assunto', '$mensagem')";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Mensagem enviada com sucesso!") window.location.href = "../portal.php"; </script>';
    } else {
        echo "Erro ao enviar a mensagem: " . mysqli_error($conn);
    }
}

function getProjectsOptions()
{
    include('db_connect.php');

    $sql = "SELECT * FROM projetos";
    $resultado = mysqli_query($conn, $sql);

    // Exibe as opções no select
    echo "<select name='projeto'>";
    echo "<option value=''>-- Selecionar projeto --</option>";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<option value='" . $linha['projeto_ID'] . "'>" . $linha['foto_proj'] . "</option>";
    }
    echo "</select>";

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
}
