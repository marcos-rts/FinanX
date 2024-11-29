<?php
// require_once '../config/Classes/Banco.php';
require_once '../../config/Classes/Banco.php';
// require_once '../config/log/log.php';
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


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>FinanX</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.html">FinanX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
                aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastro
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../_Cadastros/categoria.php">Categoria</a>
                            <a class="dropdown-item active" href="../_Cadastros/subcategoria.php">Subcategoria <span class="sr-only">(página atual)</span></a>
                            <a class="dropdown-item" href="#">Outra ação</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Algo mais aqui</a>
                        </div>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="nav-link disabled" href="#">Desativado</a>
                </form>
            </div>
        </nav>
    </header>

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

    <footer class="bg-dark text-white fixed-bottom text-center p-3">
        <p>Desenvolvido por Marcos Santos - © 2024</p>
    </footer>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>