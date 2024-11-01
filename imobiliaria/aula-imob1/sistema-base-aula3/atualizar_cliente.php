<?php
include "connection.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$idcidade = $_POST['idcidade'];
$estado = $_POST['estado'];
$fone = $_POST['fone'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$aceitaspam = $_POST['aceitaspam'];
$dtnasc = $_POST['dtnasc'];
$estcivil = $_POST['estcivil'];

// Atualiza os dados no banco de dados
$query = "UPDATE clientes SET 
            nome='$nome', tipo='$tipo', cpf='$cpf', rg='$rg', rua='$rua', bairro='$bairro', 
            idcidade='$idcidade', estado='$estado', fone='$fone', celular='$celular', email='$email', 
            cep='$cep', aceitaspam='$aceitaspam', dtnasc='$dtnasc', estcivil='$estcivil' 
          WHERE id=$id";

if (mysqli_query($conn, $query)) {
    echo "<p>Cliente atualizado com sucesso!</p>";
} else {
    echo "<p>Erro ao atualizar cliente: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>
