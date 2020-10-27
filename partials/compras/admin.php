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
        <h1>Ver Compras</h1>
    </div>
    <br />
    <div class="row">
        <table class="table">
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
                        <td><?= $linha['usuario'] ?></td>
                        <td><?= $linha['produto'] ?></td>
                        <td><?= $linha['pqntd'] ?></td>
                        <td><?= $linha['cqntd'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>