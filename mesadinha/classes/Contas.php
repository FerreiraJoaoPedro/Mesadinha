<?php
require_once "Conexao.php";
require_once "Categorias.php";

class Contas
{
    public $codigo;
    public $nome;
    public $tipo;
    public $categoria_id;


    public function listar_contas() {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select contas.codigo, contas.nome, contas.tipo, categorias.nome as categoria 
from contas join categorias on categorias.codigo = contas.codigo_categorias");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            } else {
            }

        } catch (PDOException $msg) {
            echo "Não foi possivel listar os dados {$msg->getMessage()}";
        }

    }

    public function inserir()
    {
        try {
            if (isset($_POST["nome"]) && isset($_POST["tipo"]))
            {
                $this->codigo = $_GET["codigo"];
                $this->nome = $_POST["nome"];
                $this->tipo = $_POST["tipo"];
                $this->categoria_id = $_POST["categoria"];

                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into contas (codigo,nome,tipo,codigo_categorias) values (null,?,?,?)");
                $sql->execute(array(
                    $this->nome,
                    $this->tipo,
                    $this->categoria_id
                ));

                if ($sql->rowCount() > 0){
                    header("location:tabela_contas.php");
                }
            }else{
                header("location:tabela_contas.php");
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
                $sql = $con->prepare("select * from contas where codigo = ?");
                $sql->execute(array($this->codigo));

                if ($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel listar as contas {$msg->getMessage()}";
        }
    }

    public function excluir($codigo){
        try {
            if (isset($codigo)){
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("delete from contas where codigo = ?;");
                $sql->execute(array($this->codigo));

                if ($sql->rowCount() > 0){
                    header("location:tabela_contas.php");
                }
            }

            else{
                header("location:CadastroContas.php");
            }

        }
        catch (PDOException $msg){
            echo "Não foi possível excluir a conta {$msg->getMessage()}";
        }
    }

    public function alterar(){
        try {
            if (isset($_POST["Salvar"])){
                $this->codigo = $_GET["codigo"];
                $this->nome = $_POST["nome"];
                $this->tipo = $_POST["tipo"];
                $this->categoria_id = $_POST["categoria"];

                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("update contas set nome = ?, tipo = ?, codigo_categorias = ? where codigo = ?");
                $sql->execute(array(
                    $this->nome,
                    $this->tipo,
                    $this->categoria_id,
                    $this->codigo
                ));

                if ($sql->rowCount() > 0){
                    header("location:tabela_contas.php");
                }
                else{
                    header("location:tabela_contas.php");
                }
            }
        }
        catch (PDOException $msg){
            echo "Não foi possível alterar a conta {$msg->getMessage()}";
        }
    }
}