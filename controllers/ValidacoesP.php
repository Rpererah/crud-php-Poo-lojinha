<?php
require_once 'models/Produto.php';
require_once 'Functions.php';

class ValidacoesP extends Produto{

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
		}elseif(strlen($this->getFoto()) >= 256){
			$functions->avisoEmail();
			exit;
		}elseif(strlen($this->getPreco()) >= 256){
			$functions->avisoSenha();
            exit;
        }elseif(strlen($this->getPrecoColetivo()) >= 256){
			$functions->avisoSenha();
			exit;
		}elseif(empty($this->getNome() 
			&& $this->getFoto() 
            && $this->getPreco()
            && $this->getPrecoColetivo() 
            )){
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
        $foto = mysqli_real_escape_string($conexao->conecta(), $foto);
        $preco = mysqli_real_escape_string($conexao->conecta(), $preco);
        $precoColetivo = mysqli_real_escape_string($conexao->conecta(), $precoColetivo);

		if(empty($nome)){
			$functions->avisoNomeUpdate();
        }
        elseif(empty($email)){
            $functions->avisoFotoUpdate();
        }
        elseif(empty($email)){
            $functions->avisoPrecoUpdate();
        }
        elseif(empty($email)){
            $functions->avisoPrecoColetivoUpdate();
        }
        else{
			$this->setId($id);
            $this->setNome($nome);
            $this->setEmail($foto);
            $this->setEmail($preco);
            $this->setEmail($precoColetivo);
			$this->update();
		}
	}

	public function filtraDeleta($id){
		$conexao = new Conexao();
		$id = mysqli_real_escape_string($conexao->conecta(), $id);
		$this->setId($id);
		$this->delete();

	}

	public function filtraProduto($id){
		$conexao = new Conexao();
		$id = mysqli_real_escape_string($conexao->conecta(), $id);
		$this->setId($id);
		$this->mostraProduto();
	}
}

?>