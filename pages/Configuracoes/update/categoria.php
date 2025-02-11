<?php
require_once '../../../config/Classes/Banco.php';
require_once '../../../config/log/log.php';
include '../../../includes/header.php';

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
        <a href="../listagem_categorias.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>



<?php
include '../../../includes/footer.php';

?>