<!doctype html>
<html>

    <head>
        <!-- Metadados -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="./styles/formulario.css" media="screen">

        <!-- Título da página (aparece na aba) -->
        <title>Edição de Filmes</title>
    </head>

    <body>

        <!-- Cabeçalho com título e subtítulo (ambos com css de id "titulo") -->
        <div>
            <h1 id="titulo">Edição de Filmes</h1>
            <p id="subtitulo">Altere os campos com as informações do filme</p>
            <br>
        </div>

        <!-- Início do formulário -->
        <?php
            require("conecta.php");
            $dados_select = mysqli_query($conn, "SELECT * FROM filme WHERE id_filme = {$_GET['id']}");
            $dado = mysqli_fetch_array($dados_select);
        ?>
        <form method="POST" action="editar_filme.php?id=<?=$dado['id_filme']?>">
        
            <fieldset class="grupo">
                <!-- Campo do nome com legenda "nome" e css de classe "campo" -->
                <div class="campo">
                    <label for="nome"><strong>Nome do filme</strong></label>
                    <input type="text" name="nome" id="nome" value="<?=$dado['nome_filme']?>" required>
                </div>
            </fieldset>

            <!-- Campo de desenvolvimento web com 3 opções de botões selecionáveis (radio button) e css de classe "campo" -->
            <div class="campo">
                <label><strong>Avaliação:</strong></label>
                <label>
                    <input type="radio" name="nota" value="1" <?=$dado['nota_filme'] == 1 ? "checked" : ""?>>Nota: 1
                </label>
                <label>
                    <input type="radio" name="nota" value="2" <?=$dado['nota_filme'] == 2 ? "checked" : ""?>>Nota: 2
                </label>
                <label>
                    <input type="radio" name="nota" value="3" <?=$dado['nota_filme'] == 3 ? "checked" : ""?>>Nota: 3
                </label>
                <label>
                    <input type="radio" name="nota" value="4" <?=$dado['nota_filme'] == 4 ? "checked" : ""?>>Nota: 4
                </label>
                <label>
                    <input type="radio" name="nota" value="5" <?=$dado['nota_filme'] == 5 ? "checked" : ""?>>Nota: 5
                </label>
                
            </div>

            <!-- Campo de senioridade com 3 opções para escolha (select option) e css de classe "campo" -->
            <div class="campo">
                <label for="genero"><strong>Gênero</strong></label>
                <select id="genero" name="genero" required>
                    <option disabled value="">Selecione</option>
                    <option value="Ação" <?= $dado['genero_filme'] == "Ação" ? "SELECTED" : ""?>>Ação</option>
                    <option value="Comédia" <?= $dado['genero_filme'] == "Comédia" ? "SELECTED" : ""?>>Comédia</option>
                    <option value="Drama" <?= $dado['genero_filme'] == "Drama" ? "SELECTED" : ""?>>Drama</option>
                    <option value="Fantasia" <?= $dado['genero_filme'] == "Fantasia" ? "SELECTED" : ""?>>Fantasia</option>
                    <option value="Terror" <?= $dado['genero_filme'] == "Terror" ? "SELECTED" : ""?>>Terror</option>
                    <option value="Ficção Científica" <?= $dado['genero_filme'] == "Ficção Científica" ? "SELECTED" : ""?>>Ficção Científica</option>
                </select>
            </div>

            <fieldset class="grupo">
                <!-- Campo de tecnologias para escolha de 1 ou mais opções para marcar (checkbox) e css de classe "campo" -->
                <div id="check">
                    <label><strong>Selecione os idiomas disponíveis:</strong></label><br><br>
                    <input type="checkbox" id="idioma1" name="idioma[]" value="Português" <?= strpos($dado['idiomas_filme'], "Português") !== false ? "checked" : ""?>>
                    <label for="idioma1"> Português</label>
                    
                    <input type="checkbox" id="idioma2" name="idioma[]" value="Inglês" <?= strpos($dado['idiomas_filme'], "Inglês") !== false ? "checked" : ""?>>
                    <label for="idioma2"> Inglês</label>
                    <input type="checkbox" id="idioma3" name="idioma[]" value="Espanhol" <?= strpos($dado['idiomas_filme'], "Espanhol") !== false ? "checked" : ""?>>
                    <label for="idioma3"> Espanhol</label>
                </div>
            </fieldset>

            <!-- Caixa de texto -->
            <div class="campo">
                <br>
                <label for="sinopse"><strong>Sinopse do filme: </strong></label>
                <textarea rows="6" style="width: 26em" id="sinopse" name="sinopse" required><?= $dado['sinopse_filme']?></textarea>
            </div>

            <!-- Botão para enviar o formulário -->
            <button class="botao" type="submit" onsubmit="">Concluído</button>

        </form>

    </body>

</html>