<!DOCTYPE html>
<html>

<head>
    <title>Cadastrar Usuário</title>
</head>

<body>
    <h2>Editar tipo de imóvel</h2>

    <?php
    include "connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include "atualizar_tipoimovel.php";

    } else {
        $id = $_GET['id'];
        $query = "SELECT id, tipo FROM tipoimovel WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {

    ?>
                <form method="post" action="">
                    <label>Tipo de imóvel:</label>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="tipo" value="<?php echo $row['tipo']; ?>" required><br><br>

                    <input type="submit" value="Atualizar">
                </form>
    <?php

            } else {
                echo "<p>Tipo de imóvel não encontrado.</p>";
            }
        } else {
            echo "<p>Erro ao executar a consulta: " . mysqli_error($conn) . "</p>";
        }
    }

    ?>
</body>

</html>