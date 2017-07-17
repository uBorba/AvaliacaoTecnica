<?php

/* Arquivo de configuração da base:
    Deve ser editado alterando as variaveis conforme o servidor de dados.
*/

$dbHost="localhost"; //"crested-polarity.000webhostapp.com";
$dbUserName="id2183875_clarindo";
$dbPassword="clarindo";
$dbName="id2183875_usuarios";
$tblName="contato";

$conn = new mysqli("$dbHost", "$dbUserName", "$dbPassword", "$dbName");

//$sqlSelect = null;

//$id = null;
//$nome = null;
//$email = null;
//$telefone = null;
//$setor = null;
//$obs = null;
//$sqlInsert = null;

//$sqlDelete = null;

//$sqlUpdate = null;

//verifica conexão.
if($conn->connect_error) {
   die("Falhou conexao: " . $conn->connect_error);
}

?>
