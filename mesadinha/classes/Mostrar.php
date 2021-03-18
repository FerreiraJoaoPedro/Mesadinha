<?php
require_once "Conexao.php";

class Mostrar
{

    public $despesas;
    public $receitas;

    public function listar_receita(){
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select sum(valor) from lancamentos where tipo = 'Receitas'");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            } else {
            }

        } catch (PDOException $msg) {
            echo "Não foi possivel listar os dados {$msg->getMessage()}";
        }
    }
}