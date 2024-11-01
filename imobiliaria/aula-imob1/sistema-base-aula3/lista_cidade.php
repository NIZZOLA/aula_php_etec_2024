<h1>Cidades</h1>

<a href="cadastrar_cidade.php">Incluir novo</a>

<?php
include "connection.php";

//estabece a query do banco de dados
$sql = "SELECT id, nome_cidade, estado FROM cidade";
//executa a query e coloca o resultado em $result
$result = $conn->query($sql);

//se o número de linhas do resultado for maior que 0
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Cidade</th><th>Estado</th><th>Ações</th></tr>";
    //percorre a lista de registros
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome_cidade"]. "</td>";
        echo "<th>" . $row["estado"]. "</th>";
        echo "<th><a href='editar_cidade.php?id=".$row["id"]."'>Editar</a>
        <a href='excluir_cidade.php?id=".$row["id"]."'>Excluir</a></th>";
        
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();


echo "<a href='index.php'>Voltar</a>";

?>
