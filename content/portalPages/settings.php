<?php
session_start();
include('../functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // verifica qual formulário foi enviado
    if (isset($_POST['formAltNome'])) {
        // chama a função atualizarNome
        atualizarNome($_POST['new_name']);
    } else if (isset($_POST['formAltSenha'])) {
        // chama a função atualizarSenha
        atualizarSenha($_POST['new_psw']);
    } else if (isset($_POST['new_photo'])) {
        enviarArquivos($_FILES['foto-perfil']);
    }
}
?>

<div class="container full-window">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6">
            <div class="glass p-5">
                <h2><i class="fa-solid fa-user-pen"></i> Aqui você pode alterar os seus dados pessoais</h2>
                <h3 class="mt-3">Alterar foto do perfil</h3>
                <form action="portalPages/settings.php" method="POST" enctype="multipart/form-data">
                    <label for="foto-perfil" class="my-btn2">Escolher foto</label>
                    <input type="file" class="d-none" name="foto-perfil" id="foto-perfil" accept="image/*">
                    <button type="submit" class="my-btn" name="new_photo">Alterar foto</button><br>
                </form>

                <h3 class="mt-3">Alterar nome do perfil</h3>
                <form action="portalPages/settings.php" method="POST" id="formAltNome">
                    <input type="text" class="projInputs w-50" name="new_name" value="<?php echo $_SESSION['nome']; ?>">
                    <button type="submit" class="my-btn" name="formAltNome">Alterar</button>
                </form>

                <h3 class="mt-3">Alterar senha</h3>
                <form action="portalPages/settings.php" method="POST" id="formAltSenha">
                    <input type="password" class="projInputs w-50" name="new_psw" placeholder="***********">
                    <button type="submit" class="my-btn" name="formAltSenha">Alterar</button>
                </form>
            </div>

        </div>
    </div>

</div>