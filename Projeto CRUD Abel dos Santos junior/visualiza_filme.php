<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Filmes</title>
    <link rel="stylesheet" href="./styles/table.css">
</head>

<body>
    <center>
        <h1>Filmes Cadastrados</h1>

        <table border="4">
            <tr>
                <td>NOME FILME</td>
                <td>NOTA</td>
                <td>IDIOMAS</td>
                <td>GENERO</td>
                <td>SINOPSE</td>
                <td>EDITAR</td>
                <td>DELETAR</td>
            </tr>
            <?php
                require("conecta.php");

                $dados_select = mysqli_query($conn, "SELECT * FROM filme");
                while($dado = mysqli_fetch_array($dados_select)) {
                    echo '<tr>';
                        echo '<td>'.$dado['nome_filme'].'</td>';
                        echo '<td>'.$dado['nota_filme'].'</td>';
                        echo '<td>'.$dado['idiomas_filme'].'</td>';
                        echo '<td>'.$dado['genero_filme'].'</td>';
                        echo '<td>'.$dado['sinopse_filme'].'</td>';
                        echo '<td><a href="edita_filme.php?id=' . $dado['id_filme'] . '"><button>Editar</button></a></td>';
                        echo '<td><button onclick="if(confirm(\'Tem certeza que deseja deletar este filme?\')) window.location.href=\'deleta_filme.php?id=' . $dado['id_filme'] . '\';">DELETAR</button></td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <br />
        <a href="index.html"><button>Voltar</button></a>
    </center>
</body>
</html>