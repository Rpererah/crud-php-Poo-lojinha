<?php
session_start();
if ($_SESSION['estaLogado'] != "1") {
   $_SESSION['loginErro'] = "Você não está logado";
   header("Location: login.php");
}
if ($_SESSION['usuarioNiveisAcessoId'] != 1) {
   $_SESSION['loginErro'] = "Você não é adminitrador";
   header("Location: login.php");
}
// echo "Administrador: " . $_SESSION['usuarioNome'] . " | " . $_SESSION['usuarioEmail'];
include_once "partials/header.php";
?>

<div>
   <h1>Bem vindo, <?= $_SESSION['usuarioNome'] ?>!</h1>
</div>

<?php
include_once "partials/footer.php";
?>