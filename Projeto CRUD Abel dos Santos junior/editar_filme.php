<?php
  require("conecta.php");
  echo '<link rel="stylesheet" type="text/css" href="styles/table.css">';
  $nome_filme = $_POST['nome'];
  $nota_filme = $_POST['nota'];
  $genero_filme = $_POST['genero'];
  $idiomas_filme = isset($_POST['idioma']) ? $_POST['idioma'] : [];
  $idiomas_filme = implode(', ', $idiomas_filme);
  $sinopse_filme = $_POST['sinopse'];

  $sql = "UPDATE filme 
    SET 
      nome_filme = '$nome_filme',
      nota_filme = '$nota_filme',
      genero_filme = '$genero_filme',
      idiomas_filme = '$idiomas_filme',
      sinopse_filme = '$sinopse_filme'
  WHERE id_filme = {$_GET['id']}";

  if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Registro Alterado com Sucesso</h1>";
    echo "<a href='index.html'><button>Voltar</button></a></center>";
  } else {
    echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
  }
?>