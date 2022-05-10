<?php

include 'conexao.php';
include 'cadastro.html';


if(empty($_POST['cad-usuario']) || empty($_POST['cad-senha']) || empty($_POST['cad-email'])){
    
    header('Location: cadastro.html');
    exit();
}



$usuario = mysqli_real_escape_string($con, $_POST['cad-usuario']);
$senha = mysqli_escape_string($con, $_POST['cad-senha']);
$email = mysqli_escape_string($con, $_POST['cad-email']);
$cpf = mysqli_escape_string($con, $_POST['cad-cpf']);
$telefone = mysqli_escape_string($con, $_POST['cad-tel']);

//Validar usuario e senha
$validUser = $con->query("SELECT COUNT(*) FROM users WHERE usuario = '{$usuario}'");
$validEmail = $con->query("SELECT COUNT(*) FROM users WHERE email = '{$email}'");

//Verificacao
$rowValidUser = $validUser->fetch_row();
$rowValidEmail = $validEmail->fetch_row();

if($rowValidUser[0] > 0){
    $msg = "<style>.error{visibility: visible; color: red;}</style>";
    echo $msg;
}

else if($rowValidEmail[0] > 0){
    $msg = "<style>.error{visibility: visible; color: red;}</style>";
    echo $msg;
}

else {  

    $query = ("insert into users (usuario, senha, email, CPF, telefone) values ('{$usuario}', md5('{$senha}'), '{$email}','{$cpf}','{$telefone}')");
    
    $result = mysqli_query($con, $query);

    if($result){
        $msg = "<style>.validacao{visibility: visible; color: green;}</style>";
        echo $msg;
    }

}







  
