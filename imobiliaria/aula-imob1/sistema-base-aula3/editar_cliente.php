<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>

    <?php
    include "connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "atualizar_cliente.php";
    } else {
        $id = $_GET['id'];
        $query = "SELECT * 
                  FROM clientes WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
    ?>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <label>Nome:</label>
                    <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br><br>

                    <label>Tipo:</label>
                    <input type="text" name="tipo" maxlength="1" value="<?php echo $row['tipo']; ?>" required><br><br>

                    <label>CPF:</label>
                    <input type="text" name="cpf" value="<?php echo $row['cpf']; ?>"><br><br>

                    <label>RG:</label>
                    <input type="text" name="rg" value="<?php echo $row['rg']; ?>"><br><br>

                    <label>Rua:</label>
                    <input type="text" name="rua" value="<?php echo $row['rua']; ?>"><br><br>

                    <label>Bairro:</label>
                    <input type="text" name="bairro" value="<?php echo $row['bairro']; ?>"><br><br>

                    <label>Cidade:</label>
                    <select name="idcidade" required>
                        <?php
                        $cidadeQuery = "SELECT id, nome_cidade FROM cidade";
                        $cidadeResult = mysqli_query($conn, $cidadeQuery);

                        while ($cidadeRow = mysqli_fetch_assoc($cidadeResult)) {
                            $selected = $cidadeRow['id'] == $row['idcidade'] ? "selected" : "";
                            echo "<option value='{$cidadeRow['id']}' $selected>{$cidadeRow['nome_cidade']}</option>";
                        }
                        ?>
                    </select><br><br>

                    <label>Estado:</label>
                    <input type="text" name="estado" maxlength="2" value="<?php echo $row['estado']; ?>"><br><br>

                    <label>Telefone:</label>
                    <input type="text" name="fone" value="<?php echo $row['fone']; ?>" required><br><br>

                    <label>Celular:</label>
                    <input type="text" name="celular" value="<?php echo $row['celular']; ?>" required><br><br>

                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

                    <label>CEP:</label>
                    <input type="text" name="cep" value="<?php echo $row['cep']; ?>" required><br><br>

                    <label>Aceita Spam:</label>
                    <input type="radio" name="aceitaspam" value="S" <?php if ($row['aceitaspam'] == 'S') echo 'checked'; ?>> Sim
                    <input type="radio" name="aceitaspam" value="N" <?php if ($row['aceitaspam'] == 'N') echo 'checked'; ?>> Não<br><br>

                    <label>Data de Nascimento:</label>
                    <input type="date" name="dtnasc" value="<?php echo $row['dtnasc']; ?>" required><br><br>

                    <label>Estado Civil:</label>
                    <select name="estcivil" required>
                        <option value="solteiro" <?php if ($row['estcivil'] == 'solteiro') echo 'selected'; ?>>Solteiro</option>
                        <option value="casado" <?php if ($row['estcivil'] == 'casado') echo 'selected'; ?>>Casado</option>
                        <option value="divorciado" <?php if ($row['estcivil'] == 'divorciado') echo 'selected'; ?>>Divorciado</option>
                        <option value="viuvo" <?php if ($row['estcivil'] == 'viuvo') echo 'selected'; ?>>Viúvo</option>
                    </select><br><br>

                    <input type="submit" value="Atualizar">
                </form>
    <?php
            } else {
                echo "<p>Cliente não encontrado.</p>";
            }
        } else {
            echo "<p>Erro ao executar a consulta: " . mysqli_error($conn) . "</p>";
        }
    }

    ?>
</body>
</html>
