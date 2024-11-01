<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    // Sanitização e coleta dos dados
    $nome = $conn->real_escape_string($_POST['nome']);
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $cpf = $conn->real_escape_string($_POST['cpf']);
    $rg = $conn->real_escape_string($_POST['rg']);
    $rua = $conn->real_escape_string($_POST['rua']);
    $bairro = $conn->real_escape_string($_POST['bairro']);
    $idcidade = intval($_POST['idcidade']);
    $estado = $conn->real_escape_string($_POST['estado']);
    $fone = $conn->real_escape_string($_POST['fone']);
    $celular = $conn->real_escape_string($_POST['celular']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($conn->real_escape_string($_POST['senha']), PASSWORD_BCRYPT); // Utilizando hash para senha
    $cep = $conn->real_escape_string($_POST['cep']);
    $aceitaspam = $conn->real_escape_string($_POST['aceitaspam']);
    $dtnasc = $conn->real_escape_string($_POST['dtnasc']);
    $estcivil = $conn->real_escape_string($_POST['estcivil']);

    // SQL para inserir o cliente
    $sql = "INSERT INTO clientes (nome, tipo, cpf, rg, rua, bairro, idcidade, estado, fone, celular, email, senha, cep, aceitaspam, dtnasc, estcivil) 
            VALUES ('$nome', '$tipo', '$cpf', '$rg', '$rua', '$bairro', '$idcidade', '$estado', '$fone', '$celular', '$email', '$senha', '$cep', '$aceitaspam', '$dtnasc', '$estcivil')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
