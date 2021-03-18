<?php
header("Content-type:text/html; charset=utf8");
require_once "classes/Alunos.php";
$alunos = new Alunos();

if (isset($_GET["codigo"])){
    $dadosdoaluno = $alunos->listarID($_GET["codigo"]);
}
if (isset($_POST["Salvar"])){
    $alunos->alterar();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mesadinha</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha
    384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<section class="cabecalho">
    <div class="controle">Controle Finaceiro Pessoal</div>
    <section class="sequition">
        <div class="item"><a class="link" href="Home.php">Home</a></div>
        <select class="selequiti" name="Conta" onchange="location = this.value;">
            <option value="">Tabelas</option>
            <option value="tabela_usuarios.php" >Usuários</option>
            <option value="tabela_categorias.php" >Categorias</option>
            <option value="tabela_contas.php" >Contas</option>
            <option value="tabela_lancamentos.php">Lancamentos</option>
        </select>
        <div class="item"><a class="link"  href="index.php">Sair</a></div>
    </section>
</section>
</section>

<div class="main">
    <div class="frmcadastro">
        <form action="Alterar.php?codigo=<?php echo $dadosdoaluno->codigo;?>" method="post" class="form form-group">
            <div class="flex">
                <div class="col-lg-9">
                    <p>Nome:</p>
                    <input type="text" name="nome" id="nome" class="input" value="<?php echo $dadosdoaluno->nome; ?>" required><br><br>
                </div>

                <div class="col-lg-3">
                    <p>Sexo:</p>
                    <select name="sexo" id="sexo" class="input" required>
                        <option value="">Escolha uma opção</option>
                        <option value="Masculino"<?php if ($dadosdoaluno->sexo == "Masculino") {echo "selected";}?>>Masculino</option>
                        <option value="Feminino"<?php if ($dadosdoaluno->sexo == "Feminino") {echo "selected";}?>>Feminino</option>
                        <option value="Outros"<?php if ($dadosdoaluno->sexo == "Outros") {echo "selected";}?>>Outros</option>
                    </select><br><br>
                </div></div>

            <div class="flex">
                <div class="col-lg-6">
                    <p>Email:</p>
                    <input type="email" name="email" id="email" required class="input" value="<?php echo $dadosdoaluno->email; ?>"><br><br>
                </div>
                <div class="col-lg-6">
                    <p>Endereço:</p>
                    <input type="text" name="endereco" id="endereco" required class="input" oninput="mascaracep()" maxlength="9" value="<?php echo $dadosdoaluno->endereco; ?>"><br><br>
                </div></div>

            <div class="flex">

                <div class="col-lg-8">
            <p>Telefone:</p>
            <input type="text" name="telefone" id="telefone" required class="input" oninput="mascaratelefone()" maxlength="14" value="<?php echo $dadosdoaluno->telefone; ?>"><br><br>
                </div>
                    <div class="col-lg-4">
                    <p>Senha:</p>
            <input type="password" name="senha" id="senha" required class="input" value="<?php echo $dadosdoaluno->senha; ?>"><br><br>
                    </div></div>

            <div class="alignment">
                <button class="btn btn-outline-success button2" type="submit" name="Salvar" id="salvar">Salvar</button>
                <a href="index.php" class="btn btn-outline-danger button2" name="voltar" id="voltar">Voltar</a>
            </div>
        </form>

    </div>
    <script src="js/mascara.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>