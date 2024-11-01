<?php
include "connection.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_cidade = $_POST['nome_cidade'];
    $id = $_POST['id'];
    $estado = $_POST['estado'];

    // Atualiza o tipo no banco de dados    
    $stmt = $conn->prepare("UPDATE cidade set nome_cidade =?, estado =? where id=?");
    $stmt->bind_param("ssi", $nome_cidade, $estado, $id);

    if ($stmt->execute()) {
        echo "Cidade atualizada com sucesso! <a href='lista_cidade.php'>Voltar</a>";
    } else {
        echo "Erro ao cadastrar a cidade: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
