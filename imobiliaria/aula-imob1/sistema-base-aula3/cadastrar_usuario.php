<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h2>Cadastrar Novo Usuário</h2>
    <form method="post" action="gravar_usuario.php">
        <label>Nome de Usuário:</label>
        <input type="text" name="username" required><br><br>
        
        <label>Senha:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
