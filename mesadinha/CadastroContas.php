<?php
header("Content-type:text/html; charset=utf8");
session_start();
require_once "classes/Categorias.php";
require_once "classes/Contas.php";
$categorias = new Categorias();
$contas = new Contas();
$listacategorias = $categorias->listar_categorias();
$listacontas = $contas->listar_contas();
if (isset($_POST["salvar"])) {
    $contas->inserir();
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
    <div class="alignment"><h2 class="title">Cadastro Contas</h2></div>
    <form action="CadastroContas.php" method="post" class="form form-group">


        <div class="flex">
        <div class="col-lg-6">
        <p>Nome:</p>
            <input type="text" name="nome" id="nome" class="input" required><br><br></div>
            <div class="col-lg-6">
        <p>Tipo:</p>
        <select name="tipo" id="tipo" class="input" required>
            <option value="">Selecione um tipo de conta</option>
            <option value="Receitas">Receitas</option>
            <option value="Despesas">Despesas</option>
        </select><br><br>
            </div></div>


    <div class="flex">
        <div class="col-lg-12">
        <p>Categoria:</p>
        <select name="categoria" id="categoria" class="input" required>
            <option value="">Escolha uma opção</option>
            <?php foreach ($listacategorias as $categoria) { ?>

            <option value="<?php echo $categoria->codigo; ?>"><?php echo $categoria->nome; ?></option>
            <?php } ?>
        </select></div></div>
        <div class="alignment">
            <button class="btn btn-outline-success button2" name="salvar" id="entrar" type="submit">Cadastrar</button>
            <a href="tabela_contas.php" class="btn btn-outline-danger button2" name="voltar" id="voltar">Voltar</a>
        </div>
    </form>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>