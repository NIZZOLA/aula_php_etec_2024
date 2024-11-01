<h1>Lista de usuários</h1>

<a href="cadastrar_usuario.php">Incluir novo usuário</a>

<?php
include "connection.php";

//estabece a query do banco de dados
$sql = "SELECT 0 id, username, 'email' email FROM users";
//executa a query e coloca o resultado em $result
$result = $conn->query($sql);

//se o número de linhas do resultado for maior que 0
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
    //percorre a lista de registros
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();

?>
