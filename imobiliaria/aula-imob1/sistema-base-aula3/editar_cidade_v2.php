<!DOCTYPE html>
<html>

<head>
    <title>Editar Usuário</title>
</head>

<body>
    <h2>Editar cidade</h2>

    <?php
    include "connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include "atualizar_cidade.php";
    } else {
        $id = $_GET['id'];
        $query = "SELECT id, nome_cidade, estado FROM cidade WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {

    ?>
                <form method="post" action="">
                    <label>Nome da Cidade:</label>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="nome_cidade" value="<?php echo $row['nome_cidade']; ?>" required><br><br>
                    <label>Estado:</label>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <select name="estado" required>
                        <?php
                        $estados = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"];
                        foreach ($estados as $estado) {
                            $selected = ($estado == $row['estado']) ? "selected" : "";
                            echo "<option value=\"$estado\" $selected>$estado</option>";
                        }
                        ?>
                    </select>
                        
                    <input type="submit" value="Atualizar">
                </form>
    <?php

            } else {
                echo "<p>Cidade não encontrada.</p>";
            }
        } else {
            echo "<p>Erro ao executar a consulta: " . mysqli_error($conn) . "</p>";
        }
    }

    ?>
</body>

</html>