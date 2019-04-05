<?php

include ("adodb5/adodb.inc.php");

// Conexão com o banco de dados 
$dbuser = "contratos";
$dbpassword = "contratos";

$tns = "(DESCRIPTION =
    (ADDRESS_LIST =
        (ADDRESS =
          (PROTOCOL = TCP)
          (Host = localhost)
          (Port = 1521)
        )
    )
    (CONNECT_DATA = 
    (SERVICE_NAME=xe)
    )
  )";

 
$conn = ADONewConnection('oci8'); //funcionou sem o & pelo que pesquisei por causa da versao do PHP mais atual
//$dbMV = &ADONewConnection('oci8');
//$dbMV = NewADOConnection('oci8'); 
$conn->Connect($tns, $dbuser, $dbpassword);
?>



