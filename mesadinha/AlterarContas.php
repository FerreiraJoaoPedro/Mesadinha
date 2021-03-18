<?php

header("Content-type:text/html; charset=utf8");
require_once "classes/Contas.php";
$contas = new Contas();
$categorias = new Categorias();
$listacategorias = $categorias->listar_categorias();
if (isset($_GET["codigo"])){
    $dadosdaconta = $contas->listarID($_GET["codigo"]);
}
if (isset($_POST["Salvar"])){
    $contas->alterar();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mesadinha</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/flex.css">
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
        <form action="AlterarContas.php?codigo=<?php echo $contas->codigo;?>" method="post" class="formulario">
            <div class="flex">
                <div class="col-lg-9">
                    <p>Nome:</p>
                    <input type="text" name="nome" id="nome" class="campo" value="<?php echo $dadosdaconta->nome; ?>" required><br><br>
                </div>

                <div class="col-lg-3">
                    <p>Tipo:</p>
                    <select name="tipo" id="tipo" class="campo" required>
                        <option value="">Escolha uma opção</option>
                        <option value="Receitas"<?php if ($dadosdaconta->tipo == "Receitas") {echo "selected";}?>>Receitas</option>
                        <option value="Despesas"<?php if ($dadosdaconta->tipo == "Despesas") {echo "selected";}?>>Despesas</option>
                    </select><br><br>
                </div></div>
            <select name="categoria" class="campo" required>
                <option value="">Escolha uma opção</option>
            <?php foreach ($listacategorias as $categoria) { ?>

                <option value="<?php echo $categoria->codigo; ?>"><?php echo $categoria->nome; ?></option>
            <?php } ?>
            </select>


                <button class="btn btn-outline-success" type="submit" name="Salvar" id="salvar">Salvar</button>
                <a href="index.php" class="btn btn-outline-danger" name="voltar" id="voltar">Voltar</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>