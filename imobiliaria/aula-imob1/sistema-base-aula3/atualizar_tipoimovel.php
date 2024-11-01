<?php
include "connection.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $id = $_POST['id'];

    // Atualiza o tipo no banco de dados    
    $stmt = $conn->prepare("UPDATE tipoimovel set tipo=? where id=?");
    $stmt->bind_param("si", $tipo, $id);

    if ($stmt->execute()) {
        echo "Tipo atualizado com sucesso! <a href='lista_tipoimovel.php'>Voltar</a>";
    } else {
        echo "Erro ao cadastrar o tipo: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
