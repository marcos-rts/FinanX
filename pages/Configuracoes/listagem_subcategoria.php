<?php
require_once '../../config/Classes/Banco.php';
require_once '../../config/log/log.php';
include '../../includes/header.php'

?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Subcategorias</h2>
            <a href="cadastros/subcategoria.php" class="btn btn-primary">Adicionar Nova Subcategoria</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemplo de item, esses valores serão gerados dinamicamente -->
                <tr>
                    <td>1</td>
                    <td>Subcategoria Exemplo</td>
                    <td>Categoria Exemplo</td>
                    <td>
                        <a href="editar_subcategoria.html?id=1" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
                <?php
                $sql = "SELECT s.id, s.nome as subcategoria, c.nome as categoria FROM subcategoria AS s join categoria AS c on s.categoria_id = c.id";
                $resultado = Banco::query($sql);
                if ($resultado) {
                    foreach ($resultado as $subcategoria){
                        echo "<tr><td> {$subcategoria['id']}</td>";
                        echo "<td> {$subcategoria['subcategoria']}</td>";
                        echo "<td> {$subcategoria['categoria']}</td>";
                        echo "<td><a href='editar_subcategoria.html?id=1' class='btn btn-warning btn-sm'>Editar</a><button class='btn btn-danger btn-sm'>Excluir</button></td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
