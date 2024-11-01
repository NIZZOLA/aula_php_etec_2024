<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Imóvel</title>
</head>
<body>
    <h2>Cadastrar Imóvel</h2>

    <?php
    include "connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idcidade = $_POST['idcidade'];
        $idtipo = $_POST['idtipo'];
        $idcliente = $_POST['idcliente'];
        $descricao = $_POST['descricao'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $valorvenda = $_POST['valorvenda'];
        $valorlocacao = $_POST['valorlocacao'];
        $iptu = $_POST['iptu'];
        $condominio = $_POST['condominio'];
        $metragemterreno = $_POST['metragemterreno'];
        $metragemconstruida = $_POST['metragemconstruida'];
        $quartos = $_POST['quartos'];
        $suites = $_POST['suites'];
        $banheiros = $_POST['banheiros'];
        $vagasgaragem = $_POST['vagasgaragem'];
        $areagourmet = isset($_POST['areagourmet']) ? 1 : 0;
        $piscina = isset($_POST['piscina']) ? 1 : 0;
        $churrasqueira = isset($_POST['churrasqueira']) ? 1 : 0;
        $status = isset($_POST['status']) ? 1 : 0;
        $datacriacao = date("Y-m-d H:i:s");

        $query = "INSERT INTO imoveis (
                      idcidade, idtipo, idcliente, descricao, endereco, bairro, valorvenda, 
                      valorlocacao, iptu, condominio, metragemterreno, metragemconstruida, 
                      quartos, suites, banheiros, vagasgaragem, areagourmet, piscina, churrasqueira, 
                      status, datacriacao
                  ) VALUES (
                      '$idcidade', '$idtipo', '$idcliente', '$descricao', '$endereco', '$bairro', 
                      '$valorvenda', '$valorlocacao', '$iptu', '$condominio', '$metragemterreno', 
                      '$metragemconstruida', '$quartos', '$suites', '$banheiros', '$vagasgaragem', 
                      '$areagourmet', '$piscina', '$churrasqueira', '$status', '$datacriacao'
                  )";

        if (mysqli_query($conn, $query)) {
            echo "<p>Imóvel cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar imóvel: " . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn);
    }
    ?>

    <form method="post" action="">

        <label>Cidade:</label>
        <select name="idcidade" required>
            <option value="">Selecione a cidade</option>
            <?php
            $cidadeQuery = "SELECT id, nome_cidade FROM cidade order by nome_cidade";
            $cidadeResult = mysqli_query($conn, $cidadeQuery);
            while ($cidadeRow = mysqli_fetch_assoc($cidadeResult)) {
                echo "<option value='{$cidadeRow['id']}'>{$cidadeRow['nome_cidade']}</option>";
            }
            ?>
        </select><br><br>

        <label>Tipo de Imóvel:</label>
        <select name="idtipo" required>
            <option value="">Selecione o tipo de imóvel</option>
            <?php
            $tipoQuery = "SELECT id, tipo FROM tipoimovel order by tipo";
            $tipoResult = mysqli_query($conn, $tipoQuery);
            while ($tipoRow = mysqli_fetch_assoc($tipoResult)) {
                echo "<option value='{$tipoRow['id']}'>{$tipoRow['tipo']}</option>";
            }
            ?>
        </select><br><br>

        <label>Cliente:</label>
        <select name="idcliente" required>
            <option value="">Selecione o cliente</option>
            <?php
            $clienteQuery = "SELECT id, nome FROM clientes order by nome";
            $clienteResult = mysqli_query($conn, $clienteQuery);
            while ($clienteRow = mysqli_fetch_assoc($clienteResult)) {
                echo "<option value='{$clienteRow['id']}'>{$clienteRow['nome']}</option>";
            }
            ?>
        </select><br><br>

        <label>Descrição:</label>
        <input type="text" name="descricao" maxlength="200"><br><br>

        <label>Endereço:</label>
        <input type="text" name="endereco" maxlength="50"><br><br>

        <label>Bairro:</label>
        <input type="text" name="bairro" maxlength="50"><br><br>

        <label>Valor de Venda:</label>
        <input type="number" name="valorvenda" step="0.01"><br><br>

        <label>Valor de Locação:</label>
        <input type="number" name="valorlocacao" step="0.01"><br><br>

        <label>IPTU:</label>
        <input type="number" name="iptu" step="0.01"><br><br>

        <label>Condomínio:</label>
        <input type="number" name="condominio" step="0.01"><br><br>

        <label>Metragem do Terreno:</label>
        <input type="number" name="metragemterreno" step="0.01"><br><br>

        <label>Metragem Construída:</label>
        <input type="number" name="metragemconstruida" step="0.01"><br><br>

        <label>Quartos:</label>
        <input type="number" name="quartos" min="0"><br><br>

        <label>Suítes:</label>
        <input type="number" name="suites" min="0"><br><br>

        <label>Banheiros:</label>
        <input type="number" name="banheiros" min="0"><br><br>

        <label>Vagas na Garagem:</label>
        <input type="number" name="vagasgaragem" min="0"><br><br>

        <label>Área Gourmet:</label>
        <input type="checkbox" name="areagourmet" value="1"><br><br>

        <label>Piscina:</label>
        <input type="checkbox" name="piscina" value="1"><br><br>

        <label>Churrasqueira:</label>
        <input type="checkbox" name="churrasqueira" value="1"><br><br>

        <label>Status:</label>
        <input type="checkbox" name="status" value="1" checked> Ativo<br><br>

        <input type="submit" value="Cadastrar Imóvel">
    </form>

</body>
</html>
