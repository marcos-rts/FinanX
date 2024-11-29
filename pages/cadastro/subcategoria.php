<?php
require_once '../../config/Classes/Banco.php';
require_once '../../config/log/log.php';
// Inicializa o Logger
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

include '../../includes/header.php'

?>

    <div class="container">
        <br>
        <div class="container">
            <br>
            <form method="POST">
                <div class="form-group">
                    <div class="form-group">
                        <label for="categoria">Select de exemplo</label>
                        <select class="form-control" name="categoria" id="categoria">
                            <?php
                            $sql = "SELECT * FROM categoria;";
                            $resultado = Banco::query($sql);
                            if ($resultado) {
                                foreach ($resultado as $linha) {
                                    echo "<option value='" . $linha['id'] . "'>{$linha['nome']}</option>";
                                }
                                # code...
                            } else {
                                echo "Nenhuma Categoria encontrada.";
                            }
                            ?>
                        </select>
                        <label for="subcategoria">subcategoria</label>
                        <input type="text" class="form-control" id="subcategoria" name="subcategoria" aria-describedby="subcategoria"
                            placeholder="nome subcategoria">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        <br>
        <?php
        $sql = "SELECT * FROM subcategoria;";
        $resultado = Banco::query($sql);
        if ($resultado) {
            foreach ($resultado as $linha) {
                echo "<p><strong>ID:</strong> {$linha['id']} <strong>subcategoria:</strong> {$linha['nome']}</p>";
            }
            $logger->info("Lista de subcategorias exibida.");
        } else {
            echo "<p>Nenhuma subcategoria encontrada.</p>";
        }
        ?>
        <br>
        Lista de subcategorias
    </div>
    <?php
include '../../includes/footer.php'
?>