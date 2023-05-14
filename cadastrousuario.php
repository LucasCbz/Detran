<?php

include_once "conexao.php";

$nome="";
$email="";
$tel="";
$senha="";
$id="";
$cargo="";
$cpf="";
$acao=5;

if (isset($_GET['acao'])) {
  $acao=2;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="validar.js"></script>
  <title>Document</title>
</head>

<body >
    <div class="container">
    <form class="container" action="acoes.php?acao=<?=$acao?>" method="post">
            <div class="cadastro">
                <h2>Cadastro</h2>
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder="Nome do usuário" value="<?=$nome?>">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Seu email" value="<?=$email?>">
                </div>
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" placeholder="Crie uma senha" value="<?=$senha?>">
                </div>
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" placeholder="Seu CPF" oninput="validarCPF(this)" value="<?=$cpf?>">
                </div>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="number" name="telefone" placeholder="Seu Telefone" value="<?=$tel?>">
                </div>
                <div>
                    <label for="Categoria">Categoria:</label>
                    <input type="text" name="cargo" placeholder="Sua categoria" value="<?=$cargo?>">
                </div>
                    <div class="button-cadastro">
                    <button type="submit">Cadastrar</button>
                </div><!--button-cadastro-->
                

            </div>
                

           
            

        </form>
</body>

</html>



