<?php
require_once '../../config/Classes/Banco.php';
require_once '../../config/log/log.php';
// Inicializa o Logger
$logger = new Logger();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o campo 'categoria' está presente
    if (!empty($_POST['categoria'])) {
        $categoria = trim($_POST['categoria']);

        // Prepara a query para inserir no banco de dados
        $sql = "INSERT INTO categoria (nome) VALUES ('$categoria')";

        try {
            // Executa a query
            Banco::query($sql);
            $logger->info("Categoria '{$categoria}' inserida com sucesso.");
            echo "<div class='alert alert-success'>Categoria inserida com sucesso!</div>";
        } catch (Exception $e) {
            $logger->error("Erro ao inserir categoria: " . $e->getMessage());
            echo "<div class='alert alert-danger'>Erro ao inserir categoria. Tente novamente.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>O campo 'Categoria' é obrigatório!</div>";
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
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="Categoria"
                    placeholder="nome categoria">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <br>
    <?php
    $sql = "SELECT * FROM Categoria;";
    $resultado = Banco::query($sql);
    if ($resultado) {
        foreach ($resultado as $linha) {
            echo "<p><strong>ID:</strong> {$linha['id']} <strong>Categoria:</strong> {$linha['nome']}</p>";
        }
        $logger->info("Lista de categorias exibida.");
    } else {
        echo "<p>Nenhuma categoria encontrada.</p>";
    }
    ?>
    <br>
    Lista de categorias
</div>
<?php
include '../../includes/footer.php'
?>