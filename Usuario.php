<?php
session_start();
if($_SESSION['estaLogado']!="1"){
    $_SESSION['loginErro'] = "Você não está logado";
}
echo "Usuario: ". $_SESSION['usuarioNome']." <br>  Email: ".$_SESSION['usuarioEmail'];  
?>