<?php
session_start();
header("Content-type:text/html; charset=utf8");
require_once "classes/Lancamentos.php";
require_once "classes/Contas.php";
$lancamento = new Lancamentos();
$conta = new Contas();
$lista_contas = $conta->listar_contas();
$lista_receitas = $lancamento->listar_receitas();
$lista_despesas = $lancamento->listar_despesas();



?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mesadinha</title>
    <!-- lincar com meu css-->
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

<section class="order">
    <div class="main"> <!-- div principal do site-->
        <div class="frmlogin">
            <h1 class="text-center">Receitas</h1>
            <div class="form-group">
                <H1>R$<?php echo $lista_receitas->total_receitas; ?></H1>
            </div>
        </div>
    </div>

    <div class="main"> <!-- div principal do site-->
        <div class="frmlogin">
            <h1 class="text-center">Despesas</h1>
            <div class="form-group">
                <H1>R$<?php echo $lista_despesas->total_despesas; ?></H1>
            </div>
        </div>
    </div>

    <div class="main"> <!-- div principal do site-->
        <div class="frmlogin">
            <h1 class="text-center">Saldo</h1>
            <div class="form-group">
                <H1>R$<?php
                    $receitas = $lista_receitas->total_receitas;
                    $despesas = $lista_despesas->total_despesas;
                    $total = $receitas - $despesas;

                    echo $total;
                    ?></H1>
            </div>
        </div>
    </div>
</section>

</body>
</html>
