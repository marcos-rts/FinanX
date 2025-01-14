<?php
require_once '../../../config/Classes/Banco.php';
require_once '../../../config/log/log.php';
include '../../../includes/header.php';


$logger = new Logger();
// var_dump($_POST);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o campo 'subcategoria' está presente
    if (!empty($_POST['subcategoria'])) {
        if (!empty($_POST['categoria'])) {
            $subcategoria = trim($_POST['subcategoria']);
            $categoria = trim($_POST['categoria']);

            // Prepara a query para inserir no banco de dados
            $sql = "INSERT INTO subcategoria (nome, categoria_id) VALUES ('$subcategoria', '$categoria')";

            try {
                // Executa a query
                Banco::query($sql);
                $logger->info("subcategoria '{$subcategoria}' inserida com sucesso.");
                echo "<div class='alert alert-success'>subcategoria inserida com sucesso!</div>";
            } catch (Exception $e) {
                $logger->error("Erro ao inserir subcategoria: " . $e->getMessage());
                echo "<div class='alert alert-danger'>Erro ao inserir subcategoria. Tente novamente.</div>";
            }
        } else {
            $logger->error("Tentativa de Inserção sem a Categoria");
            echo "<div class='alert alert-warning'>O campo 'Categoria' é obrigatório!</div>";
        }
    } else {
        $logger->error("Tentativa de Inserção sem a Subcategoria");
        echo "<div class='alert alert-warning'>O campo 'subcategoria' é obrigatório!</div>";
    }
}


?>
<div class="container mt-5">
    <h2>Cadastrar Nova Subcategoria</h2>
    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Subcategoria</label>
            <input type="text" id="subcategoria" name="subcategoria" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select id="categoria" name="categoria" class="form-control" required>
                <?php
                $sql = "SELECT * FROM categoria;";
                $resultado = Banco::query($sql);
                if ($resultado) {
                    foreach ($resultado as $categoria) {
                        echo "<option value='" . $categoria['id'] . "'>{$categoria['nome']}</option>";
                    }
                    # code...
                } else {
                    echo "Nenhuma Categoria encontrada.";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="../listagem_subcategoria.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>

</html>