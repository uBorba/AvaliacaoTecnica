<?php

   // includir arquivo configuração de dados.
   include_once("db_config.php");

   if(isset($_POST['update'])) {
      $id = $_POST['id'];
      $nome=$_POST['nome'];
      $email=$_POST['email'];
      $telefone=$_POST['telefone'];
      $setor=$_POST['setor'];
      $obs=$_POST['obs'];

      // verificar campos vazios.
      if(empty($nome) || empty($email) || empty($telefone) || empty($setor)) {
           if(empty($nome)) {
              echo "<br/><font color='red'>Nome deve ser preenchido.</font><br/>";
           }
           if(empty($email)) {
              echo "<br/><font color='red'>Email deve ser preenchido.</font><br/>";
           }
           if(empty($telefone)) {
              echo "<br/><font color='red'>Telefone deve ser preenchido.</font><br/>";
           }
           if(empty($setor)) {
              echo "<br/><font color='red'>Setor deve ser preenchido.</font><br/>";
           }
       } else {
          // Campos obrigatorios ok.
          // Atualizar o registro.
          $sqlUpdate = "UPDATE contato SET nome='$nome', email='$email', telefone='$telefone', setor='$setor', obs='$obs' WHERE id=$id";
          if($conn->query($sqlUpdate) === TRUE) {
             header("Location:index.php");
          } else {
             $errorMsg = $conn->error;
             header("Location:erro.php?msg=$errorMsg");
          }
        
          //redirecionar para pagina principal.
          echo "<br/><a href='index.php'>Voltar</a>";
       }
   }
?>

<?php
   // recuperar 'id' da url.
   $id = $_GET['id'];

   //recuperar registro referente ao 'id'.
   $querySql = "SELECT id, nome, email, telefone, setor, obs FROM contato WHERE id=$id ";
   $result = $conn->query($querySql);

   while($row = $result->fetch_assoc()) {
      $nome = $row['nome'];
      $email = $row['email'];
      $telefone = $row['telefone'];
      $setor = $row['setor'];
      $obs = $row['obs'];
   }

?>

<html>

   <head>
      <title>Editar contato</title>
   </head>

   <body>
      <a href="index.php">Voltar</a>
      <br/><br/>

      <form name="frmEdit" method="post" action="edit.php<?php echo "?id=".$id;?>">

         <table border="0">

            <tr> 
               <td>Nome</td>
               <td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
            </tr>

            <tr> 
               <td>Email</td>
               <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>

            <tr> 
               <td>Telefone</td>
               <td><input type="text" name="telefone" value="<?php echo $telefone;?>"></td>
            </tr>

            <tr> 
               <td>Setor</td>
               <td><input type="text" name="setor" value="<?php echo $setor;?>"></td>
            </tr>

            <tr> 
               <td>Observacao</td>
               <td><input type="text" name="obs" value="<?php echo $obs;?>"></td>
            </tr>

            <tr>
               <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
               <td><input type="submit" name="update" value="Atualizar"></td>
            </tr>

         </table>

      </form>

   </body>

</html>
