<?php
include "connection.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_cidade = $_POST['nome_cidade'];
    $estado = $_POST['estado'];

    // Verifica se o usuário já existe no banco
    $stmt = $conn->prepare("SELECT id FROM cidade WHERE nome_cidade = ?");
    $stmt->bind_param("s", $nome_cidade);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Usuário já existe
        echo "Erro: Essa cidade já está cadastrada!";
    } else {
        
        // Insere o novo tipo no banco de dados
        $stmt = $conn->prepare("INSERT INTO cidade (nome_cidade, estado) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome_cidade, $estado);

        if ($stmt->execute()) {
            echo "Cidade cadastrada com sucesso! <a href='lista_cidade.php'>Voltar</a>";
        } else {
            echo "Erro ao cadastrar a cidade: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
