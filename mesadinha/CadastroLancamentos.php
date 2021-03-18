<?php
header("Content-type:text/html; charset=utf8");
session_start();
require_once "classes/Contas.php";
require_once "classes/Lancamentos.php";
$contas = new Contas();
$lancamentos = new Lancamentos();
$lista_contas = $contas->listar_contas();
$lista_lancamentos = $lancamentos->listar_lancamentos();
if (isset($_POST["salvar"])) {
    $lancamentos->inserir();
}
?>

<!DOCTYPE html>
<html lang="en">
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
    <div class="alignment"><h2 class="title">Cadastro Lançamentos</h2></div>
    <form action="CadastroLancamentos.php" method="post" class="form form-group">

        <div class="flex">
            <div class="col-lg-12">
        <p>Conta:</p>
        <select name="conta_id" id="conta_id" class="input" required>
            <option value="">Escolha uma opção</option>
            <?php foreach ($lista_contas as $conta) { ?>

            <option value="<?php echo $conta->codigo; ?>"><?php echo $conta->nome; ?></option>
            <?php } ?>
        </select>
            </div></div><br>
        <div class="flex">
            <div class="col-lg-12">
        <p>Valor:</p>
        <input type="text" name="valor" id="valor"  class="input" required>
            </div></div>
        <div class="alignment">
            <button class="dado button2" name="salvar" id="entrar" type="submit">Cadastrar</button>
            </div>
    </form>

</form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>