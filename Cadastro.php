<?php
    include_once 'header.php';
    require_once 'models/Usuario.php';
?>
    <div class="container">
        <form action="Cadastro.php" method="post">
        <div class="form-group">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" name="nome" />
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email" />
            </div>
            <div class="form-group">
                <label for="Senha">Senha</label>
                <input type="password" class="form-control" name="senha" />
            </div>
            <?php
                if(isset($_SESSION['Cadastrado'])){
                echo "<strong> ".$_SESSION['Cadastrado']."</strong><br/>";
                unset($_SESSION['Cadastrado']);}
            ?>
                <button type="submit" name="submit" class="btn btn-primary">Logar</button>
                <br />
                <br />
                <a href="login.php"><button type="button" class="btn btn-primary">
                Ir para Login
                </button></a>
        </form>  
    </div>
<?php
        require_once 'controllers/UsuarioCadastroSimples.php';
        include_once 'footer.php';
?>
