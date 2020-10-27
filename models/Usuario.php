<?php
// session_start();
require_once "helpers/Conexao.php";
require_once 'controllers/Validacoes.php';
require_once 'controllers/Functions.php';
class Usuario
{
    private $id;
    private $adm_usuario;
    private $nome;
    private $email;
	private $senha;
	private $foto;
	private $query;

 //Metodos CRUD
	public function login(){
		$conexao = new Conexao();
		$sql = "SELECT id_usuario, nome, email, adm_usuario FROM usuario WHERE email= '{$this->getEmail()}' AND senha='{$this->getSenha()}' LIMIT 1 ";
		$query= mysqli_query($conexao->conecta(), $sql);
		$resultado = mysqli_fetch_assoc($query);
		if(isset($resultado)){
		$_SESSION['usuarioId'] = $resultado['id_usuario'];
        $_SESSION['usuarioNome'] = $resultado['nome'];
        $_SESSION['usuarioNiveisAcessoId'] = $resultado['adm_usuario'];
        $_SESSION['usuarioEmail'] = $resultado['email'];
        if($_SESSION['usuarioNiveisAcessoId'] == "1"){
			$_SESSION['estaLogado'] ="1";
            header("Location: admin.php");
        }else{
			$_SESSION['estaLogado'] ="1";
            header("Location: index.php");
            }
		}else{   
			//Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: login.php");
        }
	}

    public function select(){
		$id_atual = $_GET['alterar'];
		$functions = new Functions();
		$conexao = new Conexao();
		$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_atual'";
		$query = mysqli_query($conexao->conecta(), $sql);

		foreach ($query as $linha) {
			$nome = $linha['nome'];
			$email = $linha['email'];
			$foto = $linha['foto'];
			$this->setNome($nome);
			$this->setEmail($email);
			$this->setFoto($foto);
		}
		

		if(mysqli_num_rows($query) <= 0){
			$functions->semCadastros();
		}
    }

    // public function insert(){
	// 	$conexao = new Conexao();
	// 	$functions = new Functions();
	// 	$sql = "INSERT INTO usuario(nome, email, senha, foto) VALUES ('{$this->getNome()}', '{$this->getEmail()}', '{$this->getSenha()}', '{$this->getFoto()}')";
	// 	mysqli_query($conexao->conecta(), $sql);
		
	// }

	public function insert(){
		$conexao = new Conexao();
		$functions = new Functions();
		$sql = "INSERT INTO usuario(nome, email, senha, foto) VALUES ('{$this->getNome()}', '{$this->getEmail()}', '{$this->getSenha()}', '{$this->getFoto()}')";
		if(mysqli_query($conexao->conecta(), $sql) or die ){
			$_SESSION['Cadastrado']="Cadastro Feito com sucesso";
			header("Location: login.php");
		}else{
			$_SESSION['Cadastrado']="Erro ao efetuar cadastro";
			header("Location: Cadastro.php");
		}
	}

    
    public function update(){
		$conexao = new Conexao();
		$functions = new Functions();
		$sql = "UPDATE usuario SET nome = '{$this->getNome()}', email= '{$this->getEmail()}', foto= '{$this->getFoto()}' WHERE id_usuario= '{$this->getId()}'";

		if(mysqli_query($conexao->conecta(), $sql) or die (mysqli_error($conexao))){
			$functions->updateSucess();
		}else{
			$functions->errorMysql();
		}

    }
    public function delete(){
		$conexao = new Conexao();
		$functions = new Functions();
		$sql = "DELETE FROM usuario WHERE id_usuario = {$this->getId()}";

		if(mysqli_query($conexao->conecta(), $sql) or die (mysqli_error($conexao))){
			$functions->deleteSucess();
		}
		else{
			$functions->errorMysql();
		}
    }
    public function mostraUsuario(){
		$conexao = new Conexao();
		$sql = "SELECT * FROM usuario";
		$query = mysqli_query($conexao->conecta(), $sql);
		$this->setQuery($query);
		
		foreach ($query as $linha) {
			$id = $linha['id_usuario'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$foto = $linha['foto'];
			$this->setFoto($foto);
			$this->setNome($nome);
			$this->setEmail($email);
			$this->setId($id);
			// echo "<p>Nome:".$nome."<br />Email: ".$email."</p>" ; 
			// echo "<a href='alterarUsuarios.php?alterar=".$id." '>Alterar</a> | ";
			// echo "<a href='verUsuarios.php?deleta=".$id." '>Deletar</a>";
		}
	}

	public function mostraFotoUsuario($id){
		$conexao = new Conexao();
		$sql = "SELECT foto FROM usuario WHERE id_usuario = '$id' LIMIT 1";
		$con = mysqli_query($conexao->conecta(), $sql);
		$row = $con->fetch_array();
		$this->setQuery($row);
	}
    


    // Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getAdm_usuario(){
        return $this->adm_usuario;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
	}
	public function getFoto(){
        return $this->foto;
	}
	public function getQuery(){
        return $this->query;
    }
    
	// Metodos Set
	public function setId($novo_valor){
		$this->id=$novo_valor;
	}
    public function setAdm_usuario($novo_valor){
        $this->adm_usuario=$novo_valor;
    }
    public function setNome($novo_valor){
        $this->nome=$novo_valor;
    }
    public function setEmail($novo_valor){
        $this->email=$novo_valor;
    }
    public function setSenha($novo_valor){
        $this->senha=$novo_valor;
	}
	public function setFoto($novo_valor){
        $this->foto=$novo_valor;
	}
	public function setQuery($novo_valor){
        $this->query=$novo_valor;
    }
}

?>