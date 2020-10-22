<?php

class Compra
{

private $id_usuario;
private $id_produto;
private $quantidade;

public function getId_usuario(){
    return $this->id_usuario;
}
public function getId_produto(){
    return $this->id_produto;
}
public function getQuantidade(){
    return $this->quantidade;
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

}

?>