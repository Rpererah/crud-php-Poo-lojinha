<?php
require_once 'models/Compra.php';
require_once 'controllers/Functions.php';
session_start();
$id_usuario=$_SESSION['usuarioId'];
$this->setId($id_usuario);
$mostrar = new Compra();
$mostrar->filtrarCompraPorUsuario();
$queryAtual = $mostrar->getQuery();

// if (!isset($_SESSION['CompraId'])) {
//     session_destroy();
//     header('Location: login.php');
// }

include_once 'partials/header.php';
?>
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
</style>
<div class="container">
    <nav id="navigation">
        <a href="verCompras.php" class="btn btn-primary">COMPRAS CADASTRADAS</a>
    </nav>
    <br>
    <div id="title">
        <h1>Ver suas Compras Contempladas pelo preço coletivo</h1>
    </div>
    <br />
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>
                        Nome do Produto
                    </th>
                    <th>
                        Quantidade Comprada por você
                    </th>
                    <th>
                        Preço com desconto
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($queryAtual as $linha) : ?>
                <tr>
                    <td><?=$linha['produto.nome'] ?></td>
                    <td><?=$linha['compra.quantidade'] ?></td>
                    <td><?=$linha['produto.precoColetivo'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>