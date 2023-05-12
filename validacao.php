<?php
include_once "conexao.php";
session_start();


$email = $_POST['email'];
$senha = $_POST['senha'];
$con =new conexao();

$sql="select * from usuario where email= '$email' and senha ='$senha' ";
$res = $con->executar($sql);

if(sizeof($res)>0){
    $_SESSION['id']=$res[0]["id"];
    $_SESSION['nome'] = $res[0]['nome'];
    header("location: inicio.html");
   
}else{
    echo "Usuário e senha inválido!";
}


?>