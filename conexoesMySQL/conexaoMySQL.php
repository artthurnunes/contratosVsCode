<?php
    getConnection();
    function getConnection(){
        $dsn = 'mysql:host=localhost;dbname=contratos';
        $user = 'root';
        $pass = '';

        try{
            $pdo = new PDO($dsn, $user, $pass);
            return $pdo;
        } catch (Exception $ex) {
            echo 'Erro: '.$ex->getMessage();
        }  
    }
    
    /*
    $conn = getConnection();

$sql = 'INSERT INTO USUARIOS (CD_USUARIO, NM_USUARIO, CD_SENHA) VALUES (?,?,?)';

$stmt = $conn->prepare($sql);

$stmt->bindValue(1, 'sdfsfdsfdsfd');
$stmt->bindValue(2, 'sfdsfdsfd');
$stmt->bindValue(3, '123456');

    if ($stmt->execute()){
        echo 'Salvo com sucesso !';
    }else{
        echo 'Erro ao salvar !';
    }*/



//https://www.youtube.com/watch?v=Z082A48LQ4M salvar
//https://www.youtube.com/watch?v=Kk-awYRtPZg consultar
//https://www.youtube.com/watch?v=hIRvaL5aR5I update
//https://www.youtube.com/watch?v=AHXYl91XHRs deletar

