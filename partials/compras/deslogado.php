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
        <h1>Ver Todas as Compras no site</h1>
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
                        Quantidade Comprada por Usuario
                    </th>
                    <th>
                        Quantidade p/ valor Coletivo
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($queryAtual as $linha) : ?>
                    <tr>
                        <td><?= $linha['produto'] ?></td>
                        <td><?= $linha['coletivo'] ?></td>
                        <td><?= $linha['quantidade'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>