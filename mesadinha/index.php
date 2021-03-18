<?php
header("Content-type: text/html; charset=utf8;");
require_once "classes/Alunos.php";
$usuario = new Alunos();
if(isset($_POST["Logar"])) {
    $usuario->login();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mesadinha</title>
    <!-- utilizando o bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- lincar com meu css-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main"> <!-- div principal do site-->
    <div class="frmlogin">
        <h1 class="text-center">Faça o Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="joaolindo@gmail.com" required>
            </div>
            <div>
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control" required><br>
            </div>
            <div class="alignment">
                <button class="btn btn-outline-success space" name="Logar">Logar</button>
                <a href="CadastroUsuarios.php" class="btn btn-outline-primary space">Registre-se</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
