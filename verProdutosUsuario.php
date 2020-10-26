<?php
session_start();
$idUsuario = $_SESSION['usuarioId'] ?? '';
include_once 'partials/header.php';
include_once "models/Produto.php";

if (!isset($_SESSION['usuarioId'])) {
    session_destroy();
    header('Location: login.php');
}

$mostrarProdutos = new Produto;
$mostrarProdutos->mostraProduto();
$queryAtual = $mostrarProdutos->getQuery();
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
                <?php foreach ($queryAtual as $linha) : ?>
                    <div class="col-4" style="margin-bottom: 30px;">
                        <div class="card">
                            <img src="uploads/produtos/<?= $linha['foto'] ?>" class="card-img-top" alt="<?= $linha['foto'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $linha['nome'] ?></h5>
                                <p class="card-text"><?= 'R$' . number_format($linha['preco'] , $decimals = 2 , $dec_point = ',' , $thousands_sep = '.' ) ?></p>
                                <form action="verProdutosUsuario.php" method="post">
                                    <input type="hidden" name="id_usuario" value="<?= $idUsuario ?>">
                                    <input type="hidden" name="id_produto" value="<?= $linha['id_produto'] ?>">
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