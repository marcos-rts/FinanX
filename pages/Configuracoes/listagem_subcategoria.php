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
            <!-- <tr>
                    <td>1</td>
                    <td>Subcategoria Exemplo</td>
                    <td>Categoria Exemplo</td>
                    <td>
                        <a href="editar_subcategoria.html?id=1" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr> -->
            <?php
            $sql = "SELECT rcs.id, bs.nome AS subcategoria, bc.nome AS categoria 
                        FROM rlc_categoria_subcategoria AS rcs 
                        JOIN bd_categoria AS bc ON rcs.categoria_id = bc.id 
                        JOIN bd_subcategoria AS bs ON rcs.subcategoria_id = bs.id;";
            $resultado = Banco::query($sql);
            if ($resultado) {
                foreach ($resultado as $subcategoria) {
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
<?php
include '../../includes/footer.php'
?>