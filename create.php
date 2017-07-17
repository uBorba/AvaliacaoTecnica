<html>
   <head>
      <title>Novo Contato</title>
   </head>

 
   <body>

      <?php
         //incluir arquivo de config. base de dados.
         include_once("db_config.php");

         if(isset($_POST['Submit'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $setor = $_POST['setor'];
            $obs = $_POST['obs'];
            // validar campos nulos
            if(empty($nome) || empty($email) || empty($telefone) || empty($setor)) {
               if(empty($nome)) {
                  echo "<font color='red'>Nome deve ser preenchido.</font><br/>";
               }
               if(empty($email)) {
                  echo "<font color='red'>Email deve ser preenchido.</font><br/>";
               }
               if(empty($telefone)) {
                  echo "<font color='red'>Telefone deve ser preenchido.</font><br/>";
               }
               if(empty($setor)) {
                  echo "<font color='red'>Setor deve ser preenchido.</font><br/>";
               }
               //link para pagina anterior.
               echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
            } else {
               // todos campos validos.
               //inserir registro na base.
               $sqlInsert = "INSERT INTO contato (nome, email, telefone, setor, obs) VALUES('$nome', '$email', '$telefone', '$setor', '$obs') ";
               if(($result = $conn->query($sqlInsert)) === TRUE) {
                  //notifica insercao do registro.
                  echo "<font color='green'>Registro incluido.";
               } else {
                  //notifica erro.
                  echo "Erro: " . $sqlInsert . "<br>" . $conn->error;
               }

               echo "<br/><a href='index.php'>Contatos</a>";
            }
         }

       ?>

   </body>

</html>
