<?php
include "connection.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];

    // Verifica se o usuário já existe no banco
    $stmt = $conn->prepare("SELECT id FROM tipoimovel WHERE tipo = ?");
    $stmt->bind_param("s", $tipo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Usuário já existe
        echo "Erro: O tipo de imóvel já está cadastrado!";
    } else {
        
        // Insere o novo tipo no banco de dados
        $stmt = $conn->prepare("INSERT INTO tipoimovel (tipo) VALUES (?)");
        $stmt->bind_param("s", $tipo);

        if ($stmt->execute()) {
            echo "Tipo cadastrado com sucesso! <a href='lista_tipoimovel.php'>Voltar</a>";
        } else {
            echo "Erro ao cadastrar o tipo: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
