<?php
  echo '<link rel="stylesheet" type="text/css" href="styles/table.css">';
  require("conecta.php");
  $nome_filme = $_POST['nome'];
  $nota_filme = $_POST['nota'];
  $genero_filme = $_POST['genero'];
  $idiomas_filme = isset($_POST['idioma']) ? $_POST['idioma'] : [];
  $idiomas_filme = implode(', ', $idiomas_filme);
  $sinopse_filme = $_POST['sinopse'];

  $sql = "INSERT INTO filme (nome_filme, nota_filme, genero_filme, idiomas_filme, sinopse_filme)
  VALUES ('$nome_filme','$nota_filme', '$genero_filme', '$idiomas_filme', '$sinopse_filme')";

  if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Registro Inserido com Sucesso</h1><br>";
    echo "<a href='index.html'><button>Voltar</button></center>";
  } else {
    echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
  }
?>