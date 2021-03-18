<?php
header("Content-type:text/html; charset=utf8");
require_once "classes/Alunos.php";

$alunos = new Alunos();

if (isset($_POST["salvar"])) {
    $alunos->inserir();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha
    384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/mascara.js"></script>

</head>
<body>
<div class="main">
    <div class="frmcadastro">
        <div class="alignment"><h2 class="title">Cadastro Usuários</h2></div>
    <form action="CadastroUsuarios.php" method="post" class="form form-group">

        <div class="flex">
            <div class="col-lg-9">
        <p>Nome:</p>
        <input type="text" name="nome" class="input" required>
            </div>
          <div class="col-lg-3">
        <p>Sexo:</p>
        <select name="sexo" id="sexo"  class="input" required>
            <option value="">Escolha uma opção</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
        </select>
          </div></div><br>

        <div class="flex">

            <div class="col-lg-6">
            <p>Email:</p>
        <input type="email" name="email" id="email" class="input" required>
            </div>

            <div class="col-lg-6">
        <p>Endereço:</p>
        <input type="text" name="endereco" id="endereco" class="input" oninput="mascaracep()" maxlength="9" required>
            </div></div><br>


        <div class="flex">
            <div class="col-lg-8">
        <p>Telefone:</p>
        <input type="text" name="telefone" id="telefone" class="input" oninput="mascaratelefone()" maxlength="14" required>
            </div>

            <div class="col-lg-4">
        <p>Senha:</p>
        <input type="password" name="senha" id="senha" class="input" required>
            </div></div><br>
        <div class="alignment">
            <button class="btn btn-outline-success button2" name="salvar" id="entrar" type="submit">Cadastrar</button>
            <a href="tabela_usuarios.php" class="btn btn-outline-danger button2" name="voltar" id="voltar">Voltar</a>
        </div>
    </form>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>