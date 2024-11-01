<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="cadastrar_cliente.php">Incluir novo</a>

    <?php
    include "connection.php";

    // Query para selecionar os dados dos clientes
    $sql = "SELECT id, nome, tipo, cpf, rg, fone, email FROM clientes";
    $result = $conn->query($sql);

    // Verifica se há registros e exibe a tabela
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>";
        // Percorre os registros e exibe cada cliente
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["tipo"] . "</td>
                    <td>" . $row["cpf"] . "</td>
                    <td>" . $row["rg"] . "</td>
                    <td>" . $row["fone"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>
                        <a href='editar_cliente.php?id=" . $row["id"] . "'>Editar</a> |
                        <a href='excluir_cliente.php?id=" . $row["id"] . "'>Excluir</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum cliente encontrado.";
    }
    $conn->close();
    ?>

    <br>
    <a href='index.php'>Voltar</a>
</body>
</html>
