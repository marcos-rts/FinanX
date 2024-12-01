<?php
include('../../../config/Classes/Config.php');
include('../../../config/Classes/Banco.php');
include '../../../includes/header.php';
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['salvar'])) {
        try {
            $data = [
                'database' => [
                    'DB_nome' => $_POST['DB_nome'],
                    'DB_host' => $_POST['DB_host'],
                    'DB_port' => $_POST['DB_port'],
                    'DB_usuario' => $_POST['DB_usuario'],
                    'DB_senha' => $_POST['DB_senha']
                ]
            ];
            Config::save($data);
            $mensagem = 'Configurações salvas com sucesso!';
        } catch (Exception $e) {
            $mensagem = 'Erro ao salvar as configurações: ' . $e->getMessage();
        }
    }

    if (isset($_POST['instalar_db'])) {
        try {
            Banco::installDb();
            $mensagem = 'Banco de dados instalado com sucesso!';
        } catch (Exception $e) {
            $mensagem = 'Erro ao instalar o banco de dados: ' . $e->getMessage();
        }
    }
}

$config = Config::load()['database'];
?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Configurações do Banco de Dados</h1>
    
    <?php if (!empty($mensagem)): ?>
        <div class="alert alert-info text-center" role="alert">
            <?= htmlspecialchars($mensagem) ?>
        </div>
    <?php endif; ?>

    <form method="post" class="border p-4 rounded shadow">
        <div class="mb-3">
            <label for="DB_nome" class="form-label">Nome do Banco</label>
            <input type="text" class="form-control" id="DB_nome" name="DB_nome" value="<?= htmlspecialchars($config['DB_nome']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="DB_host" class="form-label">Host</label>
            <input type="text" class="form-control" id="DB_host" name="DB_host" value="<?= htmlspecialchars($config['DB_host']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="DB_port" class="form-label">Porta</label>
            <input type="number" class="form-control" id="DB_port" name="DB_port" value="<?= htmlspecialchars($config['DB_port']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="DB_usuario" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="DB_usuario" name="DB_usuario" value="<?= htmlspecialchars($config['DB_usuario']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="DB_senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="DB_senha" name="DB_senha" value="<?= htmlspecialchars($config['DB_senha']) ?>">
        </div>
        <button type="submit" name="salvar" class="btn btn-primary w-100 mb-3">Salvar Configurações</button>
        <button type="submit" name="instalar_db" class="btn btn-success w-100">Instalar Banco de Dados</button>
    </form>
</div>

<?php
include '../../../includes/footer.php';
?>
