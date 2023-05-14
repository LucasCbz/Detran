<?php
include_once "conexao.php";
$acao = $_GET["acao"];

// Inserir dados
if($acao == 5) {
    $nome=$_POST['Nome'];
    $email= $_POST['email'];
    $telefone=$_POST['telefone'];
    $senha=$_POST['senha'];
    $cpf=$_POST['cpf'];
    $cargo=$_POST['cargo'];
    $sql="insert into usuario (Nome,email,senha,cpf,telefone,cargo) values ('$nome','$email','$senha','$cpf','$telefone','$cargo')";
    $conexao= new conexao();
    $conexao->executar($sql);
    header("location: inicio.html");
    die();
    
}
elseif($acao == 2) {
    $nome=$_POST['Nome'];
    $email= $_POST['email'];
    $telefone=$_POST['telefone'];
    $senha=$_POST['senha'];
    $cpf=$_POST['cpf'];
    $cargo=$_POST['cargo'];
    $sql="insert into usuario (Nome,email,senha,cpf,telefone,cargo) values ('$nome','$email','$senha','$cpf','$telefone','$cargo')";
    $conexao= new conexao();
    $conexao->executar($sql);
    header("location: listarUsuario.php?acao=5");
    die();
} 
    elseif ($acao == 1) {
    $con = new conexao();
    $cpfinf = $_POST['cpfinf'];
    $sql = "SELECT idUsuario FROM usuario WHERE cpf = '$cpfinf'";
    $res = $con->executar($sql);

    if (!empty($res)) {
        $idUsuario = $res[0]['idUsuario'];
        $nomeinf = $_POST['nomeinf'];
        $custo = $_POST['custo'];
        $data = $_POST['data'];
        $ano = $_POST['anocar'];
        $placa = $_POST['placa'];
        $marcaSelecionada = $_POST['marca'];
        $modeloSelecionado = $_POST['modelo'];

        $sql = "INSERT INTO infracao (nomeinfr, custo, data, placa, AnoCar, Usuario_idUsuario, Marca_idMarca) 
                VALUES ('$nomeinf', '$custo', '$data', '$placa', '$ano', '$idUsuario', '$marcaSelecionada')";
        $conexao = new conexao();
        $conexao->executar($sql);
        header("location: listarUsuario.php?acao=1");
    } else {
        header("location: cadastro.php?acao=1");
    }
}elseif($acao==3){
    $idInfracao = $_POST['infracao'];
    $nomeinf = $_POST['nomeinf'];
    $custo = $_POST['custo'];
    $data = $_POST['data'];
    $ano = $_POST['anocar'];
    $placa = $_POST['placa'];
    $marcaSelecionada = $_POST['marca'];

    $sql = "UPDATE infracao SET nomeinfr = '$nomeinf', custo = '$custo', data = '$data', placa = '$placa', AnoCar = '$ano', 
            Marca_idMarca = '$marcaSelecionada' WHERE idinfracao = '$idInfracao'";
    $conexao = new conexao();
    $conexao->executar($sql);
    header("location: listarUsuario.php?acao=3");
    die();

}elseif($acao==4){
    $idinfracao = $_GET['infracao'];

    $sql = "DELETE FROM infracao WHERE idinfracao = '$idinfracao'";
    $conexao = new conexao();
    $conexao->executar($sql);
    header("location: listarUsuario.php?acao=4");
    die();

}
?>
