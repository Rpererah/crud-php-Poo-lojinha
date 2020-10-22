<?php
include_once "header.php";
include_once "models/Produto.php";
$mostrarProdutos = new Produto;
$mostrarProdutos->mostraProduto();
$queryAtual = $mostrarProdutos->getQuery();
?>
<div class="container">
    <div class="container">
        <nav id="navigation">
            <a href="cadastrarProdutos.php" class="btn btn-primary">CADASTRAR PRODUTOS</a>
            <a href="verProdutosUsuario.php" class="btn btn-primary">PRODUTOS CADASTRADOS</a>
        </nav>
        <br>
        <div id="middle">
            <div id="title">
                <h1>Cadastrar Produto</h1>
            </div>
            <br />
            <div class="row">
                <?php foreach($queryAtual as $linha) : ?>
                <div class="col-4">
                    <div class="card">
                        <img src="uploads/produtos/<?= $linha['foto'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nome Produto</h5>
                            <p class="card-text">preço:</p>
                            <a href="#" class="btn btn-primary">Reservar</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once "footer.php";
?>