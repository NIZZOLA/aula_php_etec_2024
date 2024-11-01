<!DOCTYPE html>
<html>

<head>
    <title>Cadastrar Usuário</title>
</head>

<?php include "gravar_cidade.php"; ?>

<body>
    <h1>Cadastrar Cidade</h1>
    <form method="post" action="">
        <label>Nome da cidade:</label>
        <input type="text" name="nome_cidade" required><br><br>

        <label> Estado:</label>
        <select name="estado">
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
        </select>

        <br>
        <br>

        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>