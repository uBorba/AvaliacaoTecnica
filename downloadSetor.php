<?php

   // incluir arquivo de configuração da base...
   include_once("db_config.php");
   
   $setor = $_GET['setor'];

   $xml = "<?xml version='1.0' encoding='UTF-8'?>";
   $xml .= "<contatos> ";

   // recupera dados por setor.
   $sql = "SELECT id, nome, email, telefone, setor, obs FROM contato WHERE setor='$setor' ";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
      // incluir atributos do contato a string xml.
      $rowId = $row['id'];
      $xml .= "<contato ";
      $rowNome = $row['nome'];
      $xml .= "nome='".$rowNome."' ";
      $rowEmail = $row['email'];
      $xml .= "email='".$rowEmail."' ";
      $rowTelefone = $row['telefone'];
      $xml .= "telefone='".$rowTelefone."' ";
      $rowSetor = $row['setor'];
      $xml .= "setor='".$rowSetor."' ";
      $rowObs = $row['obs'];
      // não incluir obs nula.
      if($rowObs) {
         $xml .= "obs='".$rowObs."' ";
      }
      // fechar tag do registro...
      $xml .= "/> ";
   }
   // fechar xml, tag root = contatos.
   $xml .= "</contatos>";

   // Objeto XML dom para download.
   $doc = new DomDocument();
   $doc->loadXML($xml);
   
   // Cabeçalho para download
   header('Content-type: "text/xml"; charset="utf8"');
   $fileName = strftime("%Y%m%d%H%M%S") . ".xml";
   header('Content-disposition: attachment; filename="'.$fileName.'"');
   
   // Conteudo do DOM document para download.
   // o arquivo é gerado sob demanda e enviado para download sem gerar copia no servidor
   // desta maneira evita-se o acumulo de arquivos XML no servidor.
   echo $doc->saveXML();

?>
