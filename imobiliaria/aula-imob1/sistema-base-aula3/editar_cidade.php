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

                    <select name="estado" value="<?php echo $row['estado']; ?>" required><br><br>>
                        <option value="AC" <?php if($row["estado"]=="AC") echo 'selected'; ?> >AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO" <?php if($row["estado"]=="RO") echo 'selected'; ?>>RO</option>
                        <option value="RR" <?php if($row["estado"]=="RR") echo 'selected'; ?>>RR</option>
                        <option value="SC" <?php if($row["estado"]=="SC") echo 'selected'; ?>>SC</option>
                        <option value="SP" <?php if($row["estado"]=="SP") echo 'selected'; ?>>SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
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