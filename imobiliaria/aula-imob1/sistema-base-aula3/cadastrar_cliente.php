<!-- formulário_cliente.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <h1>Cadastro de Cliente</h1>
    <?php include "incluir_cliente.php"; ?>

    <form action="" method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Tipo: <input type="text" name="tipo" maxlength="1" required><br><br>
        CPF: <input type="text" name="cpf"><br><br>
        RG: <input type="text" name="rg"><br><br>
        Rua: <input type="text" name="rua"><br><br>
        Bairro: <input type="text" name="bairro"><br><br>
        
        Cidade:
        <select name="idcidade" required>
            <?php
            include "connection.php";
            
            $sql = "SELECT id, nome_cidade, estado FROM cidade order by nome_cidade, estado";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nome_cidade']} - {$row['estado']}</option>";
            }
            $conn->close();
            ?>
        </select><br><br>
        
        Estado: <input type="text" name="estado" maxlength="2"><br><br>
        Telefone: <input type="text" name="fone" required><br><br>
        Celular: <input type="text" name="celular" required><br><br>
        E-mail: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        CEP: <input type="text" name="cep" required><br><br>
        
        Aceita Spam: 
        <input type="radio" name="aceitaspam" value="S" required> Sim
        <input type="radio" name="aceitaspam" value="N"> Não<br><br>
        
        Data de Nascimento: <input type="date" name="dtnasc" required><br><br>
        
        Estado Civil:
        <select name="estcivil" required>
            <option value="solteiro">Solteiro</option>
            <option value="casado">Casado</option>
            <option value="divorciado">Divorciado</option>
            <option value="viuvo">Viúvo</option>
        </select><br><br>
        
        <input type="submit" value="Cadastrar Cliente">
    </form>
</body>
</html>
