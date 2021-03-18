<?php
require_once "Conexao.php";

class Categorias
{
    public $codigo;
    public $nome;

    public function listar_categorias() {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from categorias");
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
            if ((isset($_POST["nome"])))
            {
                $this->codigo = $_GET["codigo"];
                $this->nome = $_POST["nome"];

                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("insert into categorias (codigo,nome) values (null,?)");
                $sql->execute(array(
                    $this->nome
                ));

                if ($sql->rowCount() > 0){
                    header("location:tabela_categorias.php");
                }
            }else{
                header("location:tabela_categorias.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel inserir a categoria {$msg->getMessage()}";
        }
    }

    public function listarID($codigo)
    {
        try {

            if (isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from categorias where codigo = ?");
                $sql->execute(array($this->codigo));

                if ($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel listar as categorias {$msg->getMessage()}";
        }
    }

    public function excluir($codigo){
        try {
            if (isset($codigo)){
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("delete from categorias where codigo = ?;");
                $sql->execute(array($this->codigo));

                if ($sql->rowCount() > 0){
                    header("location:tabela_categorias.php");
                }
            }

            else{
                header("location:CadastroCategorias.php");
            }

        }
        catch (PDOException $msg){
            echo "Não foi possível excluir a categoria {$msg->getMessage()}";
        }

    }

    public function alterar(){
        try {
            if (isset($_POST["Salvar"])){
                $this->codigo = $_GET["codigo"];
                $this->nome = $_POST["nome"];

                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("update categorias set nome = ? where codigo = ?");
                $sql->execute(array(
                    $this->nome,
                    $this->codigo
                ));

                if ($sql->rowCount() > 0){
                    header("location:tabela_categorias.php");
                }
                else{
                    header("location:CadastroCategorias.php");
                }
            }
        }
        catch (PDOException $msg){
            echo "Não foi possível alterar a categoria {$msg->getMessage()}";
        }
    }
}