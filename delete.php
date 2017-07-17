<?php
//incluir arquivo de configuração de dados.
include("db_config.php");

//recupera o campo 'id' da url
$id = $_GET['id'];

//Exluir registro da base
$sqlDelete = "DELETE FROM contato WHERE id=$id";
$result = $conn->query($sqlDelete);

//redirecionar a pagina principal.
header("Location:index.php");

?>
