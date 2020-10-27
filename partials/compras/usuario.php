<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
</style>
<div class="container">
    <br>
    <div id="title">
        <h1>Ver suas Compras Contempladas pelo preço coletivo</h1>
    </div>
    <br />
    <div class="row">
        <table class="table">
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
                        <td><?= $linha['Pnome'] ?></td>
                        <td><?= $linha['quantidade'] ?></td>
                        <td><?= $linha['Ppcoletivo'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>