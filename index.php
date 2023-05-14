
<html>
    <link rel="stylesheet" type="text/css" href="css/style.css">z
<body>

    <div class="container">
        <form  class="container" action="validacao.php" method="POST">
            <div class="login">
                <h1 class="">Sistema Administrativo Escolar</h1>

                <div class="email">
                    <p>Email</p>
                    <div class="entrada-email">
                        <input type="text" placeholder="Digite seu email" name="email" required>
                    </div>
                    <hr>

                </div>
                <div class="senha">
                    <p>Senha</p>
                    <div class="entrada-senha">
                        <input type="password" placeholder="Digite sua senha" name="senha" required>
                    </div>
                </div>

                <div class="button-login">
                    <button type="submit">Entrar</button>
                </div>



                <div class="registrar">
                    <span>Ainda não tem conta?</span>
                    <a href="cadastrousuario.php">Criar usuario</a>
                </div>

            </div>
        </form>

    </div>
    
</body>
</html> 