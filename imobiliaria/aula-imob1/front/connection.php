<?php 
$conn = new mysqli('localhost', 'root', '', 'login_system');

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>