<?php
include('db_protect.php');
include('functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reuniao'])) {
    agendarReuniao();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback'])) {
    feedback();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sendMsg'])) {
    enviarMensagens();
}

if ($_SESSION['nivel_acesso'] == 3) {
    $admContent = "display: block;";
    echo "<style>console.log('Usuário com nível 3')</style>";
} else {
    $admContent = "display: none;";
    echo "<style>console.log('Usuário com nível < 3')</style>";
}

$sql = "SELECT foto FROM usuarios WHERE user_id = {$_SESSION['user_id']}";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $foto = $row['foto'];
} else {
    $foto = '/uploads/6447ee1dc233c.jpg';
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
    <div class="sidebar-nav">
        <div class="logo">
            <?php
            if (isset($foto) && !empty($foto)) {
                echo "<img src='../content/" . $foto . "' height='55rem' width='55rem' class='rounded-circle'>";
            } else {
                echo "<img src='../content/uploads/profile.jpg' height='50rem' width='50rem'>";
            }
            ?>
        </div>
        <ul class="link-items">
            <li class="link-item active">
                <a href="portal.php" class="link">
                    <i class="fa-solid fa-bars-staggered"></i>
                    <span style="--i: 1">Painel </span>
                </a>
            </li>
            <li class="link-item" style="<?php echo $admContent; ?>" id="admPage">
                <a href="#" onclick="loadContent('../content/portalPages/adm.php')" class="link">
                    <i class="fa-solid fa-house"></i>
                    <span style="--i: 2">Adminstrador</span>
                </a>
            </li>

            <li class="link-item">
                <a href="#" onclick="loadContent('../content/portalPages/settings.php')" class="link">
                    <i class="fa-solid fa-gear"></i>
                    <span style="--i: 3">Configurações</span>
                </a>
            </li>
            <li class="link-item">
                <a href="../content/logout.php" class="link" id="sair-portal">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span style="--i: 5">Sair</span>
                </a>
            </li>
            <li class="link-item">
                <a href="../index.php" class="link">
                    <img src="../image/people-circle-sharp.svg" style="filter: invert(100%); margin-left: -8px;" />
                    <span style="--i: 6">Voltar à <br> pág. inicial?</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="container boxPainel">
        <button class="btn-sidebar" aria-label="Abrir menu">
            <i class="fa-solid fa-bars-staggered"></i>
        </button>
        <div class="row">
            <div class="col-sm-12">
                <h1><?php echo "Bem-vindo, " . $_SESSION['nome'] . "!"; ?></h1>

            </div>
        </div>
        <div class="row" id="painelDeInfo">
            <div class="col-sm-5 p-2">

                <div class="containerInfo glass d-block">
                    <h3><i class="fa-solid fa-hammer"></i> Em desenvolvimento</h3>
                    <div class="ui-widgets">
                        <div class="ui-values">85%</div>
                        <div class="ui-labels">Concluindo</div>
                    </div>
                </div>

                <div class="containerInfo glass d-block">
                    <h3><i class="fa-regular fa-calendar"></i> Reuniões</h3>
                    <form action="portal.php" method="post" class="formPortal">
                        <input type="datetime-local" class="m-3 p-2 dateForm" name="agendForm" required><br>
                        <input type="submit" name="reuniao" class="my-btn" value="Agendar">
                    </form>
                </div>

                <div class="containerInfo glass d-block" style="height: 28rem;">
                    <h3><i class="fa-regular fa-calendar-check"></i> Reuniões marcadas</h3>
                    <table class='tabAgend'>
                        <?php
                        include('db_connect.php');
                        $usuario = $_SESSION['nome'];
                        $data = date('Y-m-d');

                        $sql = "SELECT * FROM agendamento WHERE usuario = '$usuario' AND data_agend >= '$data'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td class='border border-danger-subtle text-center'>" . $row['data_agend'] . "</td>";
                                echo "<td class='btnDel border border-danger-subtle text-center'><a href='portal.php?agend_id=" . $row['agend_id'] . "'>Apagar</a></td></tr>";
                            }
                        } else {
                            echo "<p>Nenhuma reunião marcada.</p>";
                        }

                        if (isset($_GET['agend_id'])) {
                            $id = $_GET['agend_id'];

                            $sql = "SELECT data_agend FROM agendamento WHERE agend_id = $id";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) == 1) {
                                $row = mysqli_fetch_assoc($result);
                                $data_agend = $row['data_agend'];

                                $dataHora = time();
                                $agend = strtotime($data_agend);
                                $diff_time = round(($agend - $dataHora) / (60 * 60), 1);
                                if ($diff_time > 72) {

                                    $sql = "DELETE FROM agendamento WHERE agend_id = $id";
                                    if (mysqli_query($conn, $sql)) {
                                        echo '<script>alert("Agendamento excluído!"); window.location.href = "portal.php"; </script>';
                                    } else {
                                        echo "Erro ao excluir agendamento: " . mysqli_error($conn);
                                    }
                                } else {
                                    echo "<h4 id='erroDelAgend'>Não é possível excluir o agendamento. A exclusão deve ser solicitada pelo menos 72 horas antes.</h4>";

                                    echo "<script>
                                            setTimeout(function() {
                                                document.getElementById('erroDelAgend').style.display = 'none';
                                            }, 7000);
                                        </script>";
                                }
                            } else {
                                echo "Agendamento não encontrado.";
                            }
                        }

                        ?>
                    </table>
                </div>
            </div>

            <div class="col-sm-7 p-2">
                <div class="glass">
                    <div class="row pt-5 text-center">
                        <h3><i class="fa-solid fa-comments"></i> Comunicações</h3>
                        <div class="p-5">
                            <form method="post" action="enviar_mensagem.php" class="formMsg">
                                <label for="destinatario">Destinatário:</label>
                                <select name="destinatario"><br>
                                    <?php
                                    // Obter o nível de acesso do usuário logado
                                    $usuario_id = $_SESSION['user_id'];

                                    $query = "SELECT nivel_acesso FROM usuarios WHERE user_id='$usuario_id'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $nivel_acesso = $row['nivel_acesso'];

                                    // Se o usuário tiver nível de acesso 3, carregar todos os usuários registrados no site como opções no menu suspenso
                                    if ($nivel_acesso == 3) {
                                        $query = "SELECT user_id, nome FROM usuarios";
                                    }
                                    // Caso contrário, carregar apenas os usuários com nível de acesso 3 como opções no menu suspenso
                                    else {
                                        $query = "SELECT user_id, nome FROM usuarios WHERE nivel_acesso=3";
                                    }

                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['user_id'] . '">' . $row['nome'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <br>
                                <label for="assunto" class="pt-3">Assunto:</label><br>
                                <input type="text" name="assunto"><br>

                                <label for="mensagem" class="pt-3">Mensagem:</label><br>
                                <textarea name="mensagem"></textarea><br>

                                <button name="sendMsg" type="submit" class="my-btn mt-3">Enviar</button>
                            </form>
                        </div>

                        <h3 class="py-5"><i class="fa-solid fa-envelope-open-text"></i> Mensagens recebidas</h3>
                        <hr>
                        <div style="height: 40vh; overflow: scroll">
                            <?php
                            // Consultar o banco de dados para obter as mensagens recebidas pelo usuário
                            $query = "SELECT mensagens.*, usuarios.nome as remetente_nome FROM mensagens JOIN usuarios ON mensagens.remetente_nome = usuarios.user_id WHERE destinatario_nome = $usuario_id";

                            $result = mysqli_query($conn, $query);

                            echo '';
                            echo '';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<h3>Assunto: ' . $row['assunto'] . '</h3>';
                                echo '<p><strong>Remetente: </strong> ' . $row['remetente_nome'] . '</p>';
                                echo '<p><strong>Mensagem: </strong>' . $row['mensagem'] . '</p>';
                                echo '<p><strong>Data:</strong> ' . $row['data_envio'] . '</p>';
                                echo '<hr>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
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

    <script src="../JS/portalClt.js"></script>
    <script src="../JS/dinamicpag.js"></script>
    <script src="../JS/jquery.js"></script>
    <script>
        $(document).ready(function() {
            //Mostrar o menu do portal
            $(".btn-sidebar").click(function() {
                $(".sidebar-nav").toggleClass("show active");
            });
        })
    </script>
</body>

</html>