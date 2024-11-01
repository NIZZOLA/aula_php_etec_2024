<?php
include "connection.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o usuário já existe no banco
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Usuário já existe
        echo "Erro: O nome de usuário já está em uso!";
    } else {
        // Criptografa a senha
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insere o novo usuário no banco de dados
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o usuário: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
