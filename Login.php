    <?php
    include_once 'header.php';
    require_once 'models/Usuario.php';
    session_start();
    ?>
    <div class="container">
        <form action="Login.php" method="post">
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email" />
            </div>
            <div class="form-group">
                <label for="Senha">Senha</label>
                <input type="password" class="form-control" name="senha" />
            </div>
            <?php
            if (isset($_SESSION['loginErro'])) {
                echo "<strong> " . $_SESSION['loginErro'] . "</strong><br/>";
                unset($_SESSION['loginErro']);
            }
            if (isset($_SESSION['Cadastrado'])) {
                echo "<strong> " . $_SESSION['Cadastrado'] . "</strong><br/>";
                unset($_SESSION['Cadastrado']);
            }
            ?>
            <button type="submit" name="submit" class="btn btn-primary">Logar</button>
            <br />
            <br />
            <a href="Cadastro.php"><button type="button" class="btn btn-primary">
                    Ir para Cadastro
                </button></a>
        </form>
    </div>

    <?php
    require_once 'controllers/UsuarioLogin.php';
    include_once 'footer.php';
    ?>