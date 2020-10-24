<?php
require_once "helpers/Conexao.php";
class Compra
{

private $id_usuario;
private $id_produto;
private $quantidade;
private $query;

//Metodos CRUD
public function select(){
    $conexao = new Conexao();
    $sql = "SELECT Compra.id_usuario, Compra.id_produto,quantidade
    FROM Compra
    INNER JOIN Usuario ON Compra.id_usuario = Usuario.id_usuario
    INNER JOIN Produto ON Compra.id_produto = Produto.id_produto;";
    $query = mysqli_query($conexao->conecta(), $sql);
    $this->setQuery($query);
    }

    public function insert(){
		$conexao = new Conexao();
		$sql = "INSERT INTO compra(id_usuario,id_produto,quantidade) VALUES ('{$this->getId_usuario()}','{$this->getId_produto()}', '{$this->getQuantidade()}')";
        mysqli_query($conexao->conecta(), $sql);
    }
    public function filtrarCompra(){
        // EM CONSTRUÇÃO -- $conexao = new Conexao();
        // $sql = "SELECT id_usuario id_produto SUM(quantidade) FROM Compra INNER JOIN Produto ON Compra.id_produto = Produto.id_produto GROUP BY id_produto HAVING SUM(quantidade)>produto.quantidadeColetivo ";
        // $query = mysqli_query($conexao->conecta(), $sql);
        
        }

public function getId_usuario(){
    return $this->id_usuario;
}
public function getId_produto(){
    return $this->id_produto;
}
public function getQuantidade(){
    return $this->quantidade;
}
public function getQuery(){
    return $this->query;
}

public function setId_usuario($novoValor){
    $this->adm_usuario=$novo_valor; 
}
public function setId_produto($novoValor){
    $this->id_produto=$novoValor;
}
public function setQuantidade($novoValor){
     $this->quantidade=$novoValor;
}
public function setQuery($novoValor){
    $this->query=$novoValor;
}

}

?>