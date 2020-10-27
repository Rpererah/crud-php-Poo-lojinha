<?php
require_once "helpers/Conexao.php";
class Compra
{

private $id_usuario;
private $id_produto;
private $quantidade;
private $query;

//Metodos CRUD
public function mostraCompra(){
    $conexao = new Conexao();
    $sql = "SELECT id_compra,usuario.nome as usuario,produto.nome as produto,produto.quantidadeColetivo as pqntd,compra.quantidade as cqntd
    FROM Compra 
    INNER JOIN Usuario ON Compra.id_usuario=Usuario.id_usuario
    INNER JOIN Produto ON Compra.id_produto=Produto.id_produto";
    $query = mysqli_query($conexao->conecta(), $sql);
    $this->setQuery($query);
    }

    public function insert(){
		$conexao = new Conexao();
		$sql = "INSERT INTO compra(id_usuario,id_produto,quantidade) VALUES ('{$this->getId_usuario()}','{$this->getId_produto()}', '{$this->getQuantidade()}')";
        mysqli_query($conexao->conecta(), $sql);
    }

    public function filtrarCompraComDesconto(){
        $conexao = new Conexao();
        $sql = "SELECT compra.id_produto,produto.nome AS Pnome,SUM(quantidade) AS QntdTotal,produto.quantidadeColetivo AS Qcoletivo
        FROM compra
        INNER JOIN Produto ON Compra.id_produto=Produto.id_produto
        GROUP BY compra.id_produto
        HAVING SUM(quantidade)>produto.quantidadeColetivo
        ";
        $query = mysqli_query($conexao->conecta(), $sql);
        $this->setQuery($query);
    }

    public function filtrarCompraPorUsuario(){
        $conexao = new Conexao();
        $sql = "SELECT usuario.id_usuario AS usuario, usuario.nome AS Unome,produto.nome AS Pnome,produto.quantidadeColetivo AS Pquantidade,quantidade,produto.precoColetivo AS Ppcoletivo
        FROM Compra 
        INNER JOIN Usuario ON Compra.id_usuario=Usuario.id_usuario
        INNER JOIN Produto ON Compra.id_produto=Produto.id_produto
        WHERE usuario.id_usuario = '{$this->getId_usuario()}'
        GROUP BY Produto.id_produto
        HAVING SUM(quantidade)>=produto.quantidadeColetivo and SUM(precoColetivo)
        ORDER BY usuario.nome;";
        $query = mysqli_query($conexao->conecta(), $sql);
        $this->setQuery($query);
        
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
    $this->id_usuario=$novoValor; 
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