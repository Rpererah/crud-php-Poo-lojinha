<?php
require_once "helpers/Conexao.php";
require_once 'controllers/ValidacoesP.php';
require_once 'controllers/FunctionsP.php';
class Produto
{
    private $id;
    private $nome;
    private $foto;
    private $preco;
    private $precoColetivo;
    private $qntdColetivo;
    private $query;


    //Metodos CRUD
    public function select(){
		$id_atual = $_GET['alterar'];
		$functionsP = new FunctionsP();
		$conexao = new Conexao();
		$sql = "SELECT * FROM produto WHERE id_prdouto = '$id_atual'";
		$query = mysqli_query($conexao->conecta(), $sql);

		foreach ($query as $linha) {
			$nome = $linha['nome'];
            $foto = $linha['foto'];
            $preco = $linha['preco'];
            $precoColetivo = $linha['precoColetivo'];
			$this->setNome($nome);
            $this->setFoto($foto);
            $this->setPreco($preco);
            $this->setPrecoColetivo($precoColetivo);
		}
		

		if(mysqli_num_rows($query) <= 0){
			$functionsP->semCadastros();
		}
    }

    public function insert(){
		$conexao = new Conexao();
		$sql = "INSERT INTO produto(nome,foto,preco,precoColetivo,qntdColetivo) VALUES ('{$this->getNome()}','{$this->getFoto()}', '{$this->getPreco()}','{$this->getPrecoColetivo()}','{$this->getQntdColetivo()}')";
        mysqli_query($conexao->conecta(), $sql);
	}

    
    public function update(){
		$conexao = new Conexao();
		$functionsP = new FunctionsP();
		$sql = "UPDATE produto SET nome = '{$this->getNome()}' , foto= '{$this->getFoto()}' , preco= '{$this->getPreco()}', precoColetivo= '{$this->getPrecoColetivo()}' WHERE id_produto= '{$this->getId()}'";

		if(mysqli_query($conexao->conecta(), $sql) or die (mysqli_error($conexao->conecta()))){
			$functionsP->updateSucess();
		}else{
			$functionsP->errorMysql();
		}

    }
    public function delete(){
		$conexao = new Conexao();
		$functionsP = new FunctionsP();
		$sql = "DELETE FROM produto WHERE id_produto = {$this->getId()}";

		if(mysqli_query($conexao->conecta(), $sql) or die (mysqli_error($conexao->conecta()))){
			$functionsP->deleteSucess();
		}
		else{
			$functionsP->errorMysql();
		}
    }
    public function mostraProduto(){
		$conexao = new Conexao();
		$sql = "SELECT * FROM produto ";
        $query = mysqli_query($conexao->conecta(), $sql);
        $this->setQuery($query);
		
		foreach ($query as $linha) {
			$id = $linha['id_produto'];
			$nome = $linha['nome'];
            $foto = $linha['foto'];
            $preco = $linha['preco'];
            $precoColetivo = $linha['precoColetivo'];
			// echo "<p>Nome:".$nome."<br />Foto: ".$foto."<br />Preco: ".$preco."<br />Preço Coletivo:".$precoColetivo. "</p>" ; 
			// echo "<a href='alterarProdutos.php?alterar=".$id." '>Alterar</a> | ";
			// echo "<a href='verProdutos.php?deleta=".$id." '>Deletar</a>";
		}
	}


    // Metodos Get
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getPrecoColetivo(){
        return $this->precoColetivo;
    }
    public function getQntdColetivo(){
        return $this->qntdColetivo;
    }
    public function getQuery(){
        return $this->query;
    }
    // Metodos Set
    public function setId($novo_valor){
        $this->id=$novo_valor;
    }
    public function setNome($novo_valor){
        $this->nome=$novo_valor;
    }
    public function setFoto($novo_valor){
        $this->foto=$novo_valor;
    }
    public function setPreco($novo_valor){
        $this->preco=$novo_valor;
    }
    public function setPrecoColetivo($novo_valor){
        $this->precoColetivo=$novo_valor;
    }
    public function setQntdColetivo($novo_valor){
        $this->qntdColetivo=$novo_valor;
    }
    public function setQuery($novo_valor){
        $this->query=$novo_valor;
    }
}

?>