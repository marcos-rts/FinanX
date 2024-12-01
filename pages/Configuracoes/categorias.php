<?php
require_once '../../config/Classes/Banco.php';
require_once '../../config/log/log.php';
include '../../includes/header.php'

?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Categorias</h2>
            <a href="cadastro_categoria.html" class="btn btn-primary">Adicionar Nova Categoria</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemplo de item, esses valores serão gerados dinamicamente -->
                <tr>
                    <td>1</td>
                    <td>Categoria Exemplo</td>
                    <td>Descrição da categoria</td>
                    <td>
                        <a href="editar_categoria.html?id=1" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
