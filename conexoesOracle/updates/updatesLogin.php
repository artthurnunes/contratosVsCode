<?php

$userURL = filter_input(INPUT_GET,'user'); //dados pela URL
$passURL = filter_input(INPUT_GET,'pass');
$funcaoPHP = filter_input(INPUT_GET,'funcao');

switch ($funcaoPHP){
    case 'updateNovaSenha': 
        updateNovaSenha($userURL,$passURL);
    break;
}

function updateNovaSenha($userP,$passP){
    include ("../conexaoOracle.php");
    try{
        $sql_update = "UPDATE USUARIOS SET CD_SENHA = '$passP',SN_SENHA_PLOGIN = 0 WHERE CD_USUARIO = '$userP' "; //ALTERAR TAMBÉM O SN PARA 0
        $conn->Execute($sql_update);
        $conn->Execute("COMMIT");
        echo json_encode(true);
    }catch(Exception $e){
        echo json_encode('Exceção capturada: ', $e->getMessage(), "\n");
    }    
         
}

/*
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
*/


