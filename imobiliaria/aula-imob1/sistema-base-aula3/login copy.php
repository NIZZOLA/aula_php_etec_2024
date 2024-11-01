<?php
// Conectar ao banco de dados
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar o comando SQL para buscar o usuário pelo nome
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Verificar se o usuário existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verificar se a senha está correta
        if (password_verify($password, $hashed_password)) {
            // Login bem-sucedido
            setcookie("loggedin", true, time() + 3600, "/");
            setcookie("username", $username, time() + 3600, "/");
            header("Location: index.php");
            exit;
        } else {
            $error = "Senha incorreta!";
        }
    } else {
        $error = "Usuário não encontrado!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label>Usuário:</label>
        <input type="text" name="username" required><br><br>
        <label>Senha:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
