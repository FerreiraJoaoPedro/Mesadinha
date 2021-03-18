<?php
require_once "Conexao.php";
require_once "Contas.php";

class Lancamentos
{
    public $codigo;
    public $conta_id;
    public $valor;
    public $data;
    public $despesas;
    public $receitas;


    public function listar_lancamentos()
    {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select lancamentos.codigo, contas.nome  as conta , lancamentos.valor
, lancamentos.data from lancamentos join contas on contas.codigo = lancamentos.conta_id");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            } else {
            }

        } catch (PDOException $msg) {
            echo "Não foi possivel listar os lançamentos {$msg->getMessage()}";
        }

    }

    public function inserir()
    {
        try {
            if (isset($_POST["conta_id"]) && isset($_POST["valor"])) {
                $this->codigo = $_GET["codigo"];
                $this->conta_id = $_POST["conta_id"];
                $this->valor = $_POST["valor"];
                $this->data = date('Y/m/d');

                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into lancamentos (codigo,conta_id,valor,data) values (null,?,?,?)");
                $sql->execute(array(
                    $this->conta_id,
                    $this->valor,
                    $this->data
                ));

                if ($sql->rowCount() > 0) {
                    header("location:tabela_lancamentos.php");
                }
            } else {
                header("location:tabela_lancamentos.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel inserir a conta {$msg->getMessage()}";
        }
    }

    public function listarID($codigo)
    {
        try {

            if (isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from lancamentos where codigo = ?");
                $sql->execute(array($this->codigo));

                if ($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel listar os lancamentos {$msg->getMessage()}";
        }
    }

    public function excluir($codigo)
    {
        try {
            if (isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("delete from lancamentos where codigo = ?;");
                $sql->execute(array($this->codigo));

                if ($sql->rowCount() > 0) {
                    header("location:tabela_lancamentos.php");
                }
            } else {
                header("location:CadastroLancamentos.php");
            }

        } catch (PDOException $msg) {
            echo "Não foi possível excluir a conta {$msg->getMessage()}";
        }
    }

    public function alterar()
    {
        try {
            if (isset($_POST["Salvar"])) {
                $this->codigo = $_GET["codigo"];
                $this->conta_id = $_POST["conta_id"];
                $this->valor = $_POST["valor"];

                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("update lancamentos set conta_id = ?, valor = ? where codigo = ?");
                $sql->execute(array(
                    $this->conta_id,
                    $this->valor,
                    $this->codigo
                ));

                if ($sql->rowCount() > 0) {
                    header("location:tabela_lancamentos.php");
                } else {
                    header("location:tabela_lancamentos.php");
                }
            }
        } catch (PDOException $msg) {
            echo "Não foi possível alterar o lançamento {$msg->getMessage()}";
        }
    }

    public function listar_receitas()
    {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select sum(valor) as total_receitas from lancamentos join contas on contas.codigo = 
            lancamentos.conta_id where contas.tipo = 'Receitas'");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchObject();
            } else {
            }

        } catch (PDOException $msg) {
            echo "Não foi possivel listar os lançamentos {$msg->getMessage()}";
        }


    }

    public function listar_despesas()
    {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select sum(valor) total_despesas from lancamentos join contas on contas.codigo = 
            lancamentos.conta_id where contas.tipo = 'Despesas'");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchObject();
            } else {
            }

        } catch (PDOException $msg) {
            echo "Não foi possivel listar os lançamentos {$msg->getMessage()}";
        }


    }

}


