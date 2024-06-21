<?php
    $servername = "localhost";
    $database = "projeto";
    $username = "root";
    $password = "";


    $conn = mysqli_connect($servername, $username, $password, $database);

    try {

        // echo '<center>Conectado com banco com sucesso!</center>';
    } catch (\Throwable $th) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }
?>