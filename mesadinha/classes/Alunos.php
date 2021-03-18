<?php
require_once "Conexao.php";


class Alunos
{
    public $codigo;
    public $nome;
    public $sexo;
    public $email;
    public $endereco;
    public $telefone;
    public $senha;


    public function listartodos()
    {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from cadastro");
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
            if (isset($_POST["nome"]) && (isset($_POST["sexo"])) && (isset($_POST["email"])) && (isset($_POST["endereco"]))
                && (isset($_POST["telefone"])) && (isset($_POST["senha"]))){
                $this->codigo = $_GET["codigo"];
                $this->nome = $_POST["nome"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->endereco = $_POST["endereco"];
                $this->telefone = $_POST["telefone"];
                $this->senha = $_POST["senha"];

                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("insert into cadastro (codigo,nome,sexo,email,endereco,telefone,senha) values (null,?,?,?,?,?,?)");
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->telefone,
                    $this->senha
                ));

                if ($sql->rowCount() > 0){
                    header("location:./");
                }
            }else{
                header("location:CadastroUsuarios.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel inserir o aluno {$msg->getMessage()}";
        }
    }

    public function listarID($codigo)
    {
        try {

            if (isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from cadastro where codigo = ?");
                $sql->execute(array($this->codigo));

                if ($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel listar os alunos {$msg->getMessage()}";
        }
    }

    public function login()
    {
        try {
            if (isset($_POST["email"]) && isset($_POST["senha"])) {
                $this->email = $_POST["email"];
                $this->senha = $_POST["senha"];
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from cadastro where email = ? and senha = ?");
                $sql->execute(array($this->email, $this->senha));
                if ($sql->rowCount() > 0) {
                    echo  "<script>
            alert('Login efetuado com sucesso!');
            window.location.href = 'Home.php';

         </script>";
                } else {
                    header("location:index.php");
                }
            } else {
                header("location:index.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel fazer o login. {$msg->getMessage()}}";
        }
    }

    public function excluir($codigo){
        try {
            if (isset($codigo)){
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("delete from cadastro where codigo = ?;");
                $sql->execute(array($this->codigo));

                if ($sql->rowCount() > 0){
                    header("location:tabela_usuarios.php");
                }
            }

            else{
                header("location:CadastroUsuarios.php");
            }

        }
        catch (PDOException $msg){
            echo "Não foi possível excluir o aluno {$msg->getMessage()}";
        }

    }

    public function alterar(){
        try {
            if (isset($_POST["Salvar"])){
                $this->codigo = $_GET["codigo"];
                $this->nome = $_POST["nome"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->endereco = $_POST["endereco"];
                $this->telefone = $_POST["telefone"];
                $this->senha = $_POST["senha"];

                $bd = new Conexao();
                $con = $bd->conectar();

                $sql = $con->prepare("update cadastro set nome = ?, sexo = ?, email = ?, endereco = ?, telefone = ?, senha = ? where codigo = ?");
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->telefone,
                    $this->senha,
                    $this->codigo
                ));

                if ($sql->rowCount() > 0){
                    header("location:tabela_usuarios.php");
                }
                else{
                    header("location:CadastroUsuarios.php");
                }
            }
        }
        catch (PDOException $msg){
            echo "Não foi possível alterar o aluno {$msg->getMessage()}";
        }
    }
}

?>