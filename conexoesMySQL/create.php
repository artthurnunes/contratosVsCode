<?php

include './conexoes/conexaoMySQL.php';

$conn = getConnection();

$sql = 'INSERT INTO USUARIOS (CD_USUARIO, NM_USUARIO, CD_SENHA) VALUES (?,?,?)';

$stmt = $conn->prepare($sql);

$stmt->bindValue(1, 'anunes123'); //bindValue passa valores 
//$stmt->bindParam(1, $teste); //passa variaveis
$stmt->bindValue(2, 'Arthur Nunes');
$stmt->bindValue(3, '123456');

    if ($stmt->execute()){
        echo 'Salvo com sucesso !';
    }else{
        echo 'Erro ao salvar !';
    }        
    



