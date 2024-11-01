<?php
// Query básica para buscar imóveis
$sql = "SELECT imoveis.*, cidade.nome_cidade, tipoimovel.tipo 
                        FROM imoveis 
                        INNER JOIN cidade ON imoveis.idcidade = cidade.id 
                        INNER JOIN tipoimovel ON imoveis.idtipo = tipoimovel.id 
                        WHERE 1 = 1";

// Filtros
if (isset($_GET['tipo']) && $_GET['tipo'] != "") {
    $tipo = $_GET['tipo'];
    $sql .= " AND imoveis.idtipo = $tipo";
}
if (isset($_GET['cidade']) && $_GET['cidade'] != "") {
    $cidade = $_GET['cidade'];
    $sql .= " AND imoveis.idcidade = $cidade";
}
if (isset($_GET['bairro']) && $_GET['bairro'] != "") {
    $bairro = $_GET['bairro'];
    $sql .= " AND imoveis.bairro LIKE '%$bairro%'";
}
if (isset($_GET['valor_max']) && $_GET['valor_max'] != "") {
    $valor_max = $_GET['valor_max'];
    $sql .= " AND imoveis.valorvenda <= $valor_max";
}

//echo $sql;
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($imovel = mysqli_fetch_assoc($result)) {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . htmlspecialchars($imovel['tipo']) . "</h5>";
        echo "<p class='card-text'><strong>Cidade:</strong> " . htmlspecialchars($imovel['nome_cidade']) . "</p>";
        echo "<p class='card-text'><strong>Bairro:</strong> " . htmlspecialchars($imovel['bairro']) . "</p>";
        echo "<p class='card-text'><strong>Valor de Venda:</strong> R$ " . number_format($imovel['valorvenda'], 2, ',', '.') . "</p>";
        echo "<a href='detalhes_imovel.php?id=" . $imovel['id'] . "' class='btn btn-primary'>Ver Mais</a>";
        echo "</div>";
        echo "<div style='float:right;width:50px;'><img src='img/logo.jpg' style='width:50px;height:50px;'></div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>Nenhum imóvel encontrado.</p>";
}

mysqli_close($conn);
