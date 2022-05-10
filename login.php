<?php

include 'conexao.php';
include 'login.html';

if(empty($_POST['login-usuario']) || empty($_POST['login-senha'])){
    
    header('Location: login.html');
    exit();
}



$usuario = mysqli_real_escape_string($con, $_POST['login-usuario']);
$senha = mysqli_escape_string($con, $_POST['login-senha']);



$query = "select usuario from users where usuario = '{$usuario}' and senha=md5('{$senha}')";

$result = mysqli_query($con, $query);

$row = mysqli_num_rows($result);


if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: conteudo.html');
} 
else{
    $msg = "<style>.validacao{visibility: visible; color: red;}</style>";
    echo $msg;
    echo $row;
}