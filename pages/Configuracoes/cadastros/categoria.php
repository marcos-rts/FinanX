<?php
require_once '../../../config/Classes/Banco.php';
require_once '../../../config/log/log.php';
include '../../../includes/header.php';

// LOGICA DO CADASTRO

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


?>
    <div class="container mt-5">
        <h2>Cadastrar Nova Categoria</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Categoria</label>
                <input type="text" id="categoria" name="categoria" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="listagem_categorias.html" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>
