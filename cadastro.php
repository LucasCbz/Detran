<?php

include_once "conexao.php";

$acao=1;
$nomeinf="";
$custo="";
$data="";
$placa="";
$cpfinf="";
$anocar="";
function buscarCPFinfrator($idUsuario)
{
    $conexao = new conexao();
    $bdusu = $conexao->executar("SELECT cpf FROM usuario WHERE idUsuario = $idUsuario");
    $usuario = $bdusu[0];
    return $usuario['cpf'];
}



if (isset($_GET['infracao'])) {
  $conexao = new conexao();
  $idInfracao = $_GET['infracao'];
  $sql = "SELECT i.*, m.idModelo AS idModelo FROM infracao i JOIN modelo m ON i.Marca_idMarca = m.Marca_idMarca WHERE i.idInfracao = $idInfracao";
  $bdusu = $conexao->executar($sql);
  if (!empty($bdusu)) {
      $infracao = $bdusu[0];
      $nomeinf = $infracao['nomeinfr'];
      $custo = $infracao['custo'];
      $data = $infracao['data'];
      $anocar = $infracao['AnoCar'];
      $placa = $infracao['placa'];
      $marcaSelecionada = $infracao['Marca_idMarca'];
      $modeloSelecionado = $infracao['idModelo'];
      $cpfinf = buscarCPFinfrator($infracao['Usuario_idUsuario']);
      $id = $idInfracao;
      $acao = 3;
  }
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

<body style=" background-image: url(Imagens/estrada.jpg);">
  <header class="header1">
    <form class="container" action="acoes.php?acao=<?=$acao?>" method="post">
    <input type="hidden" name="infracao" value="<?= $id ?>">
    <div class="cadastro1">
        <h1>Infração</h1>

        <div class="formg">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nomeinf" value="<?= $nomeinf ?>">
            </div>

            <div>
                <label for="custo">Custo:</label>
                <input type="number" name="custo" value="<?= $custo ?>">
            </div>
<br>
            <div>
                <label for="data">Data:</label>
                <input type="date" name="data" value="<?= $data ?>">
            </div>
             <br>
            <div>
                <label for="placa">Placa:</label>
                <input type="text" name="placa" value="<?= $placa ?>">
            </div>

            <div>
                <label for="anocar">Ano do carro:</label>
                <input type="number" name="anocar" value="<?= $anocar ?>">
            </div>

            <div>
                <label for="marca">Marca:</label>
                <select name="marca">
                    <?php
                    $con = new conexao();
                    $sql = "SELECT idMarca, nomeMarca FROM marca";
                    $resMarcas = $con->executar($sql);

                    foreach ($resMarcas as $marca) {
                        $idMarca = $marca['idMarca'];
                        $nomeMarca = $marca['nomeMarca'];
                        $selected = ($marcaSelecionada == $idMarca) ? 'selected' : '';
                        echo "<option value='$idMarca' $selected>$nomeMarca</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="modelo">Modelo:</label>
                <select name="modelo">
                    <?php
                    $sql = "SELECT idModelo, nomeModelo FROM modelo";
                    $resModelos = $con->executar($sql);

                    foreach ($resModelos as $modelo) {
                        $idModelo = $modelo['idModelo'];
                        $nomeModelo = $modelo['nomeModelo'];
                        $selected = ($modeloSelecionado == $idModelo) ? 'selected' : '';
                        echo "<option value='$idModelo' $selected>$nomeModelo</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="cpfinf">CPF do infrator:</label>
                <input type="text" id="cpfinf" name="cpfinf" oninput="validarCPF(this)" value="<?= $cpfinf ?>">

            </div>
            <?php 
            if(isset($_GET['acao']) ){
                if($_GET['acao']==1)
                {
    echo "CPF não existe no banco de dados";
                }
            }
                ?> 
        </div>

        <input class="sub" type="submit" value="Enviar">
    </div>
</form>

  </header>
</body>

</html>
