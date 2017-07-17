<?php

   //incluir arquivo de configuracao de dados.
   include_once("db_config.php");
?>
<html>
   <head>
      <title>Avaliacao de desenvolvedor.</title>
   </head>

<body>
   <a href="create.html">Novo Contato</a><br/><br/>

      <!-- Os registros serão exibidos em tabela, formato linha, coluna. -->
      <table width='80%' border=0>

         <tr bgcolor='#CCCCCC'>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>Setor (REST)</td>
            <td>Observacao</td>
            <td>Atualizar</td>
         </tr>

      <?php 
         // recupera dados em ordem de insercao.
         $sqlSelect = "SELECT id, nome, email, telefone, setor, obs FROM contato ORDER BY id";
         $result = $conn->query($sqlSelect);
         while($row = $result->fetch_assoc()) {
            $rowId = $row['id'];
            $rowNome = $row['nome'];
            $rowEmail = $row['email'];
            $rowTelefone = $row['telefone'];
            $rowSetor = $row['setor'];
            $rowObs = $row['obs'];
            echo "<tr>";
               echo "<td>".$rowNome."</td>";
               echo "<td>".$rowEmail."</td>";
               echo "<td>".$rowTelefone."</td>";
               // Setor possui link para filtro, clicando sobre o campo a pagina exibirá apenas os dados referentes ao setor.
               echo "<td><a href=\"xmlSetor.php?setor=$rowSetor\">".$rowSetor."</a></td>";
               echo "<td>".$rowObs."</td>";
               // Coluna com links para edição e exclusão do registro/linha.
               echo "<td><a href=\"edit.php?id=$rowId\">Editar</a> 
                  | <a href=\"delete.php?id=$rowId\" onClick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a></td>";
            echo "</tr>";
         }

      ?>

      </table>

   </body>

</html>
