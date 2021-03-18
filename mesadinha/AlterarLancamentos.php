<?php
header("Content-type:text/html; charset=utf8");
require_once "classes/Lancamentos.php";
$lancamentos = new Lancamentos();
$contas = new Contas();
$lista_contas = $contas->listar_contas();
$lista_lancamentos = $lancamentos->listar_lancamentos();
if (isset($_GET["codigo"])){
    $dadosdolancamento = $lancamentos->listarID($_GET["codigo"]);
}
if (isset($_POST["Salvar"])){
    $lancamentos->alterar();
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
</section>
<div class="main">
    <div class="frmlogin">
        <form action="AlterarLancamentos.php?codigo=<?php echo $lancamentos->codigo;?>" method="post" class="formulario">
            <div class="flex">
                <div class="col-lg-12">
                    <p>Valor:</p>
                    <input type="text" name="valor" id="valor" class="input" value="<?php echo $dadosdolancamento->valor; ?>" required><br><br>
                </div></div>

                <div class="col-lg-12">
                    <select name="conta_id" class="input" required>
                <option value="">Escolha uma opção</option>
            <?php foreach ($lista_contas as $conta) { ?>

                <option value="<?php echo $conta->codigo; ?>"><?php echo $conta->nome; ?></option>
            <?php } ?>
            </select></div>

            <div class="alignment">
                <button class="btn btn-outline-success button2" type="submit" name="Salvar" id="salvar">Salvar</button>
                <a href="index.php" class="btn btn-outline-danger button2" name="voltar" id="voltar">Voltar</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>