<?php
require_once 'models/Compra.php';
require_once 'controllers/Functions.php';
session_start();
$mostrar = new Compra();
$mostrar->mostraCompra();
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
        <h1>Ver Compras</h1>
    </div>
    <br />
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>
                        Cliente
                    </th>
                    <th>
                        Nome do Produto
                    </th>
                    <th>
                        Quantidade Comprada
                    </th>
                    <th>
                        Quantidade p/ valor Coletivo
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($queryAtual as $linha) : ?>
                <tr>
<td><?=$linha['usuario'] ?></td>
<td><?=$linha['produto'] ?></td>
<td><?=$linha['pqntd'] ?></td>
<td><?=$linha['cqntd'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>