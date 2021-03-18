<?php
session_start();
require_once "Conexao.php";
require_once "Contas.php";
require_once "Lancamentos.php";

class Movimentacao
{

    public $soma;

    public function somar_despesas()
    {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select sum(valor) as soma_despesas from lancamentos join contas on contas.codigo = lancamentos.conta_id
            where contas.tipo = 'Despesas'");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
                $_SESSION["despesas"] = $result;
            } else {
            }

        } catch (PDOException $msg) {
            echo "Não foi possivel listar os dados {$msg->getMessage()}";
        }
    }

    public function somar_receitas()
    {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select valor from lancamentos");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
                $_SESSION["receitas"] = $result;
            } else {
            }

        } catch (PDOException $msg) {
            echo "Não foi possivel listar os dados {$msg->getMessage()}";
        }

    }


}