<div class="position-sticky pt-3">
    <h4>Filtrar Imóveis</h4>

    <form action="index.php" method="GET">

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Imóvel</label>
            <select name="tipo" id="tipo" class="form-select">
                <option value="">Todos</option>
                <?php
                include "connection.php";
                $tipoQuery = "SELECT id, tipo FROM tipoimovel order by tipo";
                $tipoResult = mysqli_query($conn, $tipoQuery);
                while ($tipoRow = mysqli_fetch_assoc($tipoResult)) {
                    echo "<option value='{$tipoRow['id']}'>{$tipoRow['tipo']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <select name="cidade" id="cidade" class="form-select">
                <option value="">Todas</option>
                <?php
                $cidadeQuery = "SELECT id, nome_cidade FROM cidade order by nome_cidade";
                $cidadeResult = mysqli_query($conn, $cidadeQuery);
                while ($cidadeRow = mysqli_fetch_assoc($cidadeResult)) {
                    echo "<option value='{$cidadeRow['id']}'>{$cidadeRow['nome_cidade']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Ex.: Centro">
        </div>

        <div class="mb-3">
            <label for="valor_max" class="form-label">Valor Máximo</label>
            <input type="number" name="valor_max" id="valor_max" class="form-control" placeholder="Ex.: 500000">
        </div>
        
        <button type="submit" class="btn btn-primary">Aplicar Filtros</button>

    </form>

</div>