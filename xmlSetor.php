<?php

   //incluir arquivo de configuracao de dados.
   include_once("db_config.php");
?>
<html>
   <head>
      <title>Contatos por Setor</title>
   </head>

<body>
   <a href="index.php">Contatos</a><br/><br/>

    <table width='80%' border=0>

         <tr bgcolor='#CCCCCC'>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>Setor</td>
            <td>Observacao</td>
         </tr>

   <?php 

      $xmlSetor = "<?xml version='1.0' encoding='UTF-8'?>";
      $setor = $_GET['setor'];
      $json4Rest = "[ ";

         // recupera dados por setor.
         $sqlSelect = "SELECT id, nome, email, telefone, setor, obs FROM contato WHERE setor='$setor' ";
         $result = $conn->query($sqlSelect);
         $row = $result->fetch_assoc();
         while($row) {
            // montar string json...
            $rowId = $row['id'];
            $xmlSetor .= "<contato ";
            $rowNome = $row['nome'];
            $json4Rest .= '{ "nome":"'.$rowNome.'", ';
            $rowEmail = $row['email'];
            $json4Rest .= '"email":"'.$rowEmail.'", ';
            $rowTelefone = $row['telefone'];
            $json4Rest .= '"telefone":"'.$rowTelefone.'", ';
            $rowSetor = $row['setor'];
            $json4Rest .= '"setor":"'.$rowSetor.'"';
            $rowObs = $row['obs'];
            if($rowObs) {
               $json4Rest .= ', "observacao":"'.$rowObs.'" ';
            }
            $json4Rest .= '}';
            echo "<tr>";
               // exibir registro em colunas.
               echo "<td>".$rowNome."</td>";
               echo "<td>".$rowEmail."</td>";
               echo "<td>".$rowTelefone."</td>";
               echo "<td>".$rowSetor."</td>";
               echo "<td>".$rowObs."</td>";
            echo "</tr>";
            $row = $result->fetch_assoc();
            if($row) {
               $json4Rest .= ", ";
            }
         }
         $json4Rest .= " ]";
      ?>
         
      </table><br/><br/>
      
      <!-- Link de download para XML do setor.  -->
      <td><a href="downloadSetor.php?setor=<?php echo $setor; ?>">Baixar XML do Setor</a></td>

      <pre>

      <?php
         $jsonArray = json_decode($json4Rest, true);
         echo "<pre>";
         print_r($jsonArray);

      ?>

   </body>

</html>
