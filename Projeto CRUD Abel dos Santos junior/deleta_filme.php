<?php

require("conecta.php");
echo '<link rel="stylesheet" type="text/css" href="styles/table.css">';
$id_filme = $_GET['id'];

$sql = "DELETE FROM filme WHERE id_filme = $id_filme";

if ($conn->query($sql) === TRUE) {
  header("Location: visualiza_filme.php");
  exit;
} else {
  echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
}