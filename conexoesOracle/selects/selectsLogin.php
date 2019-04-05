<?php

$userURL = filter_input(INPUT_GET,'user'); //dados pela URL
$passURL = filter_input(INPUT_GET,'pass');
$funcaoPHP = filter_input(INPUT_GET,'funcao');

switch ($funcaoPHP){
    case 'selectVerificaUsuarioSenha': 
        selectVerificaUsuarioSenha($userURL,$passURL);
    break;
    case 'selectVerificaPrimeiroLogin':
        selectVerificaPrimeiroLogin($userURL,$passURL);
    break;
}

function selectVerificaUsuarioSenha($userP,$passP){
    include ("../conexaoOracle.php");
    $acesso = false;   
    
    try{
        $rs = $conn->GetAll("SELECT * FROM USUARIOS WHERE CD_USUARIO = UPPER('$userP') AND CD_SENHA = '$passP' ");
        if($rs == true)
            $acesso = true;
    }catch(Exception $e){
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }    
    echo json_encode($acesso);    
}

function selectVerificaPrimeiroLogin($userP,$passP){
    include ("../conexaoOracle.php");
    $primeiroLogin = false;   
    
    try{
        $rs = $conn->GetAll("SELECT * FROM USUARIOS WHERE CD_USUARIO = UPPER('$userP') 
                                                        AND CD_SENHA = '$passP'
                                                        AND SN_SENHA_PLOGIN = 1 ");
        if($rs == true)
        $primeiroLogin = true;
    }catch(Exception $e){
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }    
    echo json_encode($primeiroLogin); 

}






/*
    $conn = getConnection();
    $sql = "SELECT CD_USUARIO,CD_SENHA FROM USUARIOS WHERE CD_USUARIO = '$userP' AND CD_SENHA = '$passP' ";
    //funciona também com parametros no where por exemplo WHERE CD_USUARIO = (?) //$stmt->bindValue(1, ??);

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();

    if($result){
        $acesso = true; //login e senha existe
    }else{
        //mantem acesso false login invalido
    }

    echo json_encode($acesso);    
    */



