<?php
require_once '../../config/Classes/Banco.php';
require_once '../../config/log/log.php';
// Inicializa o Logger
$logger = new Logger();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o campo 'categoria' está presente
    $erros = [];

    // Validação dos campos
    if (empty($_POST['valor'])) {
        $erros[] = "O campo 'Valor' é obrigatório!";
    }

    if (empty($_POST['tipo'])) {
        $erros[] = "O campo 'Tipo' é obrigatório!";
    }

    if (empty($_POST['subcategoria'])) {
        $erros[] = "O campo 'Subcategoria' é obrigatório!";
    }

    if (empty($_POST['mes'])) {
        $erros[] = "O campo 'Subcategoria' é obrigatório!";
    }

    // Exibição das mensagens de erro
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<div class='alert alert-warning'>$erro</div>";
            $logger->warning($erro);
        }
    } else {
        // Lógica para caso todos os campos estejam preenchidos
        $subcategoria = trim($_POST['subcategoria']);
        $valor = trim($_POST['valor']);
        $tipo = trim($_POST['tipo']);
        $mes = trim($_POST['mes']);

        // Prepara a query para inserir no banco de dados
        $sql = "INSERT INTO transacao (valor, tipo, ano, subcategoria_id, mes_id) VALUES ('$valor', '$tipo', '2024', '$subcategoria', '$mes')";

        try {
            // Executa a query
            Banco::query($sql);
            $logger->info("Transação de '{$valor}' inserida com sucesso.");
            echo "<div class='alert alert-success alert-dismissible fade show'>Transação inserida com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        } catch (Exception $e) {
            $logger->error("Erro ao inserir categoria: " . $e->getMessage());
            echo "<div class='alert alert-danger'>Erro ao inserir Transação. Tente novamente.</div>";
        }
        // echo "<div class='alert alert-success'>Todos os campos foram preenchidos corretamente!</div>";
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
                        <a class="nav-link active" href="../_Sistema/transacao.php">link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastro
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../_Cadastros/categoria.php">Categoria <span class="sr-only">(página atual)</span></a>
                            <a class="dropdown-item" href="../_Cadastros/subcategoria.php">Subcategoria</a>
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
                    <label for="valor">valor</label>
                    <input type="number" class="form-control" id="valor" name="valor" aria-describedby="Categoria"
                        placeholder="valor da Transação">
                    <br>
                    <label for="tipo">Tipo da transação</label>
                    <select class="form-control" name="tipo" id="tipo">
                        <option value='Despesa'>Despesa</option>
                        <option value='Receita'>Receita</option>
                    </select>
                    <!-- 
                    /**
                    * TODO Implementar deposi função para ler apenas a subcategoria da categoria com Javascript
                    */ 
                    -->
                    <!-- <br>
                    <label for="categoria">Categoria</label>
                        <select class="form-control" name="categoria" id="categoria">
                            <?php
                            // $sql = "SELECT * FROM categoria;";
                            // $resultado = Banco::query($sql);
                            // if ($resultado) {
                            // foreach ($resultado as $linha) {
                            // echo "<option value='" . $linha['id'] . "'>{$linha['nome']}</option>";
                            // }
                            # code...
                            // } else {
                            // echo "Nenhuma Categoria encontrada.";
                            // }
                            ?>
                        </select>
                    <br> -->
                    <label for="subcategoria">Subcategoria</label>
                    <select class="form-control" name="subcategoria" id="subcategoria">
                        <?php
                        $sql = "SELECT * FROM subcategoria";
                        $resultado = Banco::query($sql);
                        if ($resultado) {
                            foreach ($resultado as $linha) {
                                echo "<option value='" . $linha['id'] . "'>{$linha['nome']}</option>";
                            }
                            # code...
                        } else {
                            echo "Nenhuma subcategoria encontrada.";
                        }
                        ?>
                    </select>
                    <br>
                    <label for="mes">Mes</label>
                    <select class="form-control" name="mes" id="mes">
                        <?php
                        $sql = "SELECT * FROM mes";
                        $resultado = Banco::query($sql);
                        if ($resultado) {
                            foreach ($resultado as $linha) {
                                echo "<option value='" . $linha['id'] . "'>{$linha['nome']}</option>";
                            }
                            # code...
                        } else {
                            echo "Nenhuma mes encontrada.";
                        }
                        ?>
                    </select>
                    <br>
                    <!-- <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="Categoria"
                        placeholder="nome categoria"> -->
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
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