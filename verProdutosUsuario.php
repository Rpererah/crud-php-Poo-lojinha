<?php
session_start();
$idUsuario = $_SESSION['usuarioId'] ?? '';
include_once 'partials/header.php';
include_once "models/Produto.php";

if (!isset($_SESSION['usuarioId'])) {
    session_destroy();
    header('Location: login.php');
}


$mostrarProdutosSD = new Produto;
$mostrarProdutosCD = new Produto;
$mostrarProdutosSD->filtrarCompraSemDesconto();
$mostrarProdutosCD->filtrarCompraComDesconto();
$queryComDesconto = $mostrarProdutosCD->getQuery();
$querySemDesconto = $mostrarProdutosSD->getQuery();
// $mostrarProdutos->();
?>
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
</style>
<div class="container">
    <div class="container">
        <br>
        <div id="middle">
            <div id="title">
                <h1>Ver Produtos</h1>
            </div>
            <br />
            <div class="row">
                <?php foreach ($queryComDesconto as $linhaCD) : ?>
                    <div class="col-md-4 col-sm-12" style="margin-bottom: 30px;">
                        <div class="card">
                            <img src="uploads/produtos/<?= $linhaCD['fotoCD'] ?>" class="card-img-top" alt="<?= $linhaCD['fotoCD'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $linhaCD['produtoCD'] ?></h5>



                                <p class="card-text"><span class="badge badge-warning">R$<?= number_format($linhaCD['precoCD'], $decimals = 2, $dec_point = ',', $thousands_sep = '.') ?></span></p>
                                <form action="verProdutosUsuario.php" method="post">
                                    <input type="hidden" name="id_usuario" value="<?= $idUsuario ?>">
                                    <input type="hidden" name="id_produto" value="<?= $linhaCD['id_produtoCD'] ?>">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Quantidade" min="0">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Reservar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($querySemDesconto as $linhaSD) : ?>
                    <div class="col-md-4 col-sm-12" style="margin-bottom: 30px;">
                        <div class="card">
                            <img src="uploads/produtos/<?= $linhaSD['fotoSD'] ?>" class="card-img-top" alt="<?= $linhaSD['fotoSD'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $linhaSD['produtoSD'] ?></h5>
                                <p class="card-text"><span class="badge badge-info">R$<?= number_format($linhaSD['precoSD'], $decimals = 2, $dec_point = ',', $thousands_sep = '.')  ?></span></p>
                                <form action="verProdutosUsuario.php" method="post">
                                    <input type="hidden" name="id_usuario" value="<?= $idUsuario ?>">
                                    <input type="hidden" name="id_produto" value="<?= $linhaSD['id_produtoSD'] ?>">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Quantidade" min="0">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Reservar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            include 'controllers/CompraCadastro.php';
            ?>
        </div>
    </div>
</div>

<?php
include_once "partials/footer.php";
?>