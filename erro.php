<html>
<head>
	<title>Erro no processo</title>
</head>

<body>

   <?php
      $msg = $_GET['msg'];
      echo "<br/><br/><font color='red'>Houve um erro de operação: " .  $msg;
      echo "<br/>Contate o suporte e informe a mensagem acima.";
   ?>
   
  <br/><br/><br/><a href='index.php'>Cadastro de Contatos</a>


</body>
</html>
