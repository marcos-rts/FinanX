<?php
require_once '../../../config/Classes/Banco.php';
require_once '../../../config/log/log.php';
include '../../../includes/header.php';

// LOGICA DO CADASTRO

// Inicializa o Logger
$logger = new Logger();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o campo 'Conta' está presente
    if (!empty($_POST['nome'])) {
        $nome = trim($_POST['nome']);
        $descricao = trim($_POST['descricao']);

        // Prepara a query para inserir no banco de dados
        $sql = "INSERT INTO bd_conta (nome, descricao) VALUES ('$nome', '$descricao')";

        try {
            // Executa a query
            Banco::query($sql);
            $logger->info("Conta '{$nome}' inserida com sucesso.");
            echo "<div class='alert alert-success'>Conta inserida com sucesso!</div>";
        } catch (Exception $e) {
            $logger->error("Erro ao inserir Conta: " . $e->getMessage());
            echo "<div class='alert alert-danger'>Erro ao inserir Conta. Tente novamente.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>O campo 'Nome' é obrigatório!</div>";
    }
}

?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastro de Conta</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Insira a descrição"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
