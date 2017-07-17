<?php

   //incluir arquivo de configuracao de dados.
   include_once("db_config.php");

?>


<html>

   <head>
	   <title>Contatos por Setor.</title>
   </head>

   <body>
   
      <a href="index.php">Contatos</a>
      <br/><br/>

      <?php
         $json4Rest = "[ ";
         $setor = $_GET['setor'];
         $sqlSetor = "SELECT id, nome, email, telefone, setor, obs FROM contato WHERE setor='$setor' ORDER BY id";
         $result = $conn->query($sqlSetor);
         if($row = $result->fetch_assoc()) {
            $rowId = $row['id'];
            $rowNome = $row['nome'];
            $json4Rest .= '{ "nome":"'.$rowNome.'", ';
            $rowEmail = $row['email'];
            $json4Rest .= '"email":"'.$rowEmail.'", ';
            $rowTelefone = $row['telefone'];
            $json4Rest .= '"telefone":"'.$rowTelefone.'", ';
            $rowSetor = $row['setor'];
            $json4Rest .= '"setor":"'.$rowSetor.'", ';
            $rowObs = $row['obs'];
            $json4Rest .= '"observacao":"'.$rowObs.'" }';
            while($row = $result->fetch_assoc()) {
               $rowId = $row['id'];
               $rowNome = $row['nome'];
               $json4Rest .= ', { "nome":"'.$rowNome.'", ';
               $rowEmail = $row['email'];
               $json4Rest .= '"email":"'.$rowEmail.'", ';
               $rowTelefone = $row['telefone'];
               $json4Rest .= '"telefone":"'.$rowTelefone.'", ';
               $rowSetor = $row['setor'];
               $json4Rest .= '"setor":"'.$rowSetor.'", ';
               $rowObs = $row['obs'];
               $json4Rest .= '"observacao":"'.$rowObs.'" }';
            }
            $json4Rest .= " ]";
         }
         
         echo "</br>".$json4Rest."</br>";
         $jsonArray = json_decode($json4Rest, true);
         echo "<pre>";
         print_r($jsonArray);

      ?>
   
   </body>

</html>
