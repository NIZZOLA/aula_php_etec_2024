<?php
/*
if (!isset($_COOKIE["loggedin"])) {
    header("Location: login.php");
    exit;
}
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
</head>
<body>
    <h2>Bem-vindo <?php echo $_COOKIE["username"]; ?> à página principal!</h2>
    <p><a href="logout.php">Logout</a></p>

    <div id="menu">
        <ul>
            <li><a href="./?page=usuarios">Usuários</a></li>
            <li><a href="./?page=cidades">Cidades</a></li>
            <li><a href="./?page=clientes">Clientes</a></li>
            <li><a href="./?page=tipoimovel">Tipos de imóveis</a></li>
            <li><a href="./?page=anuncios">Anúncios</a></li>
        </ul>
    </div>

    <div id="content">
        <?php
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
            if ($page == "usuarios") {
                include "lista_usuarios.php";
            }
            if ($page == "tipoimovel") {
                include "lista_tipoimovel.php";
            }
            if ($page == "anuncios") {
                include "lista_imoveis.php";
            }
            if ($page == "cidades") {
                include "lista_cidade.php";
            }
            if( $page == "clientes"){
                include "lista_clientes.php";
            }
        }
        ?>


</body>
</html>
