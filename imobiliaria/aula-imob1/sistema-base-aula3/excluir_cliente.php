<h2>Excluir Cliente</h2>
<?php
include "connection.php";

$id=$_GET['id'];
if($id == "" || !is_numeric($id)){
    echo "ID inválido.";
    exit();
}
$sql = "DELETE FROM clientes WHERE id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Registro excluído com sucesso.";
        echo '<meta http-equiv="refresh" content="5;url=index.php?page=clientes">';
    } else {
        echo "Erro ao excluir o registro: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Erro na preparação da query: " . $conn->error;
}

$conn->close();

?>