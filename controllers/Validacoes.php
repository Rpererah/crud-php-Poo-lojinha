<?php
require_once 'models/Usuario.php';
require_once 'Functions.php';

class Validacoes extends Usuario{

	// falhou--- public function filtraCadastro($nome, $email,$senha){
	// 	$conexao = new Conexao();
	// 	$functions = new Functions();
	// 	$nome = mysqli_real_escape_string($conexao->conecta(), $nome);
	// 	$email = mysqli_real_escape_string($conexao->conecta(), $email);
	// 	$senha = mysqli_real_escape_string($conexao->conecta(), $senha);
		
// 	if($conexao->conecta()){
// 		$this->setNome($nome);
// 		$this->setEmail($email);
// 		$this->setSenha($senha);
// 		$this->verificaCadastro();
// 	}else{
// 		$functions->errorMysql();
// 		exit;
// 	}
// }

	public function verificaCadastro(){
		$functions = new Functions();

		if(strlen($this->getNome()) >= 256){
			$functions->avisoNome();
			exit;
		}elseif(strlen($this->getEmail()) >= 256){
			$functions->avisoEmail();
			exit;
		}elseif(strlen($this->getSenha()) >= 256){
			$functions->avisoSenha();
			exit;
		}elseif(empty($this->getNome() 
			&& $this->getEmail() 
			&& $this->getSenha())){
			$functions->avisoCamposVazios();
		}else{
			$this->insert();
		}
	}

	public function filtraUpdate($id, $nome,$email){
		$conexao = new Conexao();
		$functions = new Functions();
		$id = mysqli_real_escape_string($conexao->conecta(), $id);
        $nome = mysqli_real_escape_string($conexao->conecta(), $nome);
        $email = mysqli_real_escape_string($conexao->conecta(), $email);

		if(empty($nome)){
			$functions->avisoNomeUpdate();
        }
        elseif(empty($email)){
            $functions->avisoEmailUpdate();
        }
        else{
			$this->setId($id);
            $this->setNome($nome);
            $this->setEmail($email);
			$this->update();
		}
	}

	public function filtraDeleta($id){
		$conexao = new Conexao();
		$id = mysqli_real_escape_string($conexao->conecta(), $id);
		$this->setId($id);
		$this->delete();

	}

	public function filtraUsuario($id){
		$conexao = new Conexao();
		$id = mysqli_real_escape_string($conexao->conecta(), $id);
		$this->setId($id);
		$this->mostraUsuario();
	}
}

?>