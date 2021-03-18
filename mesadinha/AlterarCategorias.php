<?php

header("Content-type:text/html; charset=utf8");
require_once "classes/Categorias.php";
$categorias = new Categorias();

if (isset($_GET["codigo"])){
    $dados_categoria = $categorias->listarID($_GET["codigo"]);
}
if (isset($_POST["Salvar"])){
    $categorias->alterar();
}

?>

<!DOCTYPE html>
<html lang="en">
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

<div class="main">
    <div class="frmlogin">
        <form action="AlterarCategorias.php?codigo=<?php echo $dados_categoria->codigo;?>" method="post">
            <p>Nome:</p>
            <input type="text" name="nome" id="nome" class="input" value="<?php echo $dados_categoria->nome; ?>" required><br><br>
            <div class="alignment">
                <button class="btn btn-outline-success button2" type="submit" name="Salvar" id="salvar">Salvar</button>
                <a href="index.php" class="btn btn-outline-success button2" name="voltar" id="voltar">Voltar</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>