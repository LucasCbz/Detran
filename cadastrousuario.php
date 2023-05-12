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

<body>
  <header class="header1">
    <form class="container" action="acoes.php?acao=<?=$acao?>" method="post">
      <div class="cadastro1">
        <h1>Usuário</h1>

        <div class="formg">
          <div>
            <label for="nome">Nome:</label>
            <input type="text" name="Nome" value="<?=$nome?>">
          </div>

          <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" value="<?=$email?>">
          </div>

          <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" value="<?=$senha?>">
          </div>

          <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" oninput="validarCPF(this)" value="<?=$cpf?>">
            <span id="cpf-erro"></span>
          </div>

          <div>
            <label for="telefone">Telefone:</label>
            <input type="number" name="telefone" value="<?=$tel?>">
          </div>

          <div>
            <label for="Categoria">Categoria:</label>
            <input type="text" name="cargo" value="<?=$cargo?>">
          </div>
        </div><!--formg-->
        <input class="sub" type="submit" value="Enviar">
      </div><!--cadastro1-->
    </form>
  </header>
</body>

</html>
