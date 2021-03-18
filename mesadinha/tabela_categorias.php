<?php
header("Content-type:text/html; charset=utf8");
require_once "classes/Categorias.php";
$categorias = new Categorias();
$lista_categorias = $categorias->listar_categorias();

if (isset($_GET["codigo"])){
    $categorias->excluir($_GET["codigo"]);
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
        <div>
            <div class="col-lg-10"></div>
        <div class="row">
            <div class="col-lg-12">

                <table class="table">
                    <div class="alignment"><h2 class="title">Categorias</h2></div>
                    <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                    </thead>

                    <?php if ($lista_categorias) :
                        foreach ($lista_categorias as $categoria) :?>
                            <tr>
                                <td><?php echo $categoria->codigo; ?></td>
                                <td><?php echo $categoria->nome; ?></td>
                                <td>
                                    <a href="AlterarCategorias.php?codigo=<?php echo $categoria->codigo;?>" class="btn btn-outline-success "><i class="fa fa-edit"></i> </a>
                                    <a href="tabela_categorias.php?codigo=<?php echo $categoria->codigo;?>" class="btn btn-outline-danger "><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Nenhuma categoria cadastrada</td>
                        </tr>
                    <?php endif;?>
                    </tbody>
                </table>
                <div class="buttons_alignment">
                    <a href="CadastroCategorias.php" class="dado btn">Novo</a>
                    <a href="home.html" class="volta btn">Voltar</a>
                </div>
            </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>