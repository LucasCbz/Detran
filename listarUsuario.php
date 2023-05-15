<?php

include_once "conexao.php";

$conexao = new conexao();
function buscarCPFinfrator($idUsuario)
{
    $conexao = new conexao();
    $bdusu = $conexao->executar("SELECT cpf FROM usuario WHERE idUsuario = $idUsuario");
    $usuario = $bdusu[0];
    return $usuario['cpf'];
}
function buscarmodeloinfrator($idmarca)
{
    $conexao = new conexao();
    $bdusu = $conexao->executar("SELECT NomeMarca FROM marca WHERE idMarca =$idmarca");
    $marca = $bdusu[0];
    return $marca['NomeMarca'];
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<div class="container">
<h2>Lista de infração</h2>
</div>
<div class="container">
    <a href="cadastro.php"><button class="bnt"> Criar Infração</button></a>
</div>
<hr/>
<style>
    body{background-color: #e0f5f6;
    }
    .container { text-align: center;}
    .bnt{
        border-radius: 5px;
        color: #1a60ab;
        cursor: pointer;
    }
    .tab{
        width: 95%;
        left: 40px;
        position: relative;
    }
    table th,td {
        border: 1px solid black;
        width: 5%;

    }
    th,td {
        padding:3px 8px;
    }
    th{
        background-color: #1a60ab;
        color: white;
    }
    
        table tr:nth-child(odd){
            background-color: #ddd;
    }
       table tr:nth-child(even){
        background-color: white;

   } 
    
</style>
<div class="tab">
<table>
    <tr>
        <th>ID da infracao</th>
        <th>Nome</th>
        <th>Custo</th>
        <th>Data</th>
        <th>Placa</th>
        <th>Ano Carro</th>
        <th>Nome da marca</th>
        <th>CPF do usuario </th>
        <th>ALTERAR</th>
        <th>EXCLUIR</th>
    </tr>
</div>
  <?php
   $arrinfracao= $conexao->executar("select * from infracao");
   
   foreach ($arrinfracao as $infracao){
     ?>

     <tr>
        <td><?=$infracao['idinfracao']?></td>
        <td><?php echo $infracao['nomeinfr']; ?></td>
        <td><?=$infracao['custo']?></td>
        <td><?=$infracao['data']?></td>
        <td><?=$infracao['placa']?></td>
        <td><?=$infracao['AnoCar']?></td>
        <td><?=buscarmodeloinfrator($infracao['Marca_idMarca'])?></td>
        <td><?=buscarCPFinfrator($infracao['Usuario_idUsuario'])?></td>
        <td>
            <a href="cadastro.php?infracao=<?=$infracao['idinfracao']?>">Alterar</a>
        </td>
        <td>
        <a href="acoes.php?infracao=<?=$infracao['idinfracao']?>&acao=4">Excluir</a>

        </td>
     </tr>
     <?php   
   }
  ?>
</table>
</div>
<?php
if(isset($_GET['acao']) ){
?>
<div class="alert alert-success">
<?php
if($_GET['acao']==1 || $_GET['acao']==5 )
{
    echo "Salvo com sucesso!";
}else if($_GET['acao']==3){
    echo "Alterado com sucesso!";
}else if($_GET['acao']==4){
    echo "Excluido com sucesso!";
}
?>

</div>

<?php
}
?>
