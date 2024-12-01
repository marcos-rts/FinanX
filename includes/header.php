<?php
// Define o caminho base do site
define('BASE_URL', '/GitHub/FinanX/'); // Substitua '/meu-projeto/' pelo caminho correto
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
} else {
    // header("Location: index.php");
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
    <!-- <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/header.css"> -->

    <title>FinanX</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= BASE_URL ?>">FinanX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
                aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= BASE_URL ?>index.php">Painel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>pages/sistema/transacao.php">Lançamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>pages/em_construcao.html">Relatorio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>pages/em_construcao.html">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Configurações
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= BASE_URL ?>pages/Configuracoes/listagem_categorias.php">Categoria</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>pages/Configuracoes/listagem_subcategoria.php">Subcategoria</a>
                            <div class="dropdown-divider"></div>
                            <?php
                            if (empty($_SESSION['UsuarioID'])){
                                ?>
                                <a class="dropdown-item disabled" href="#">Configurações</a>
                                <?php
                            }else{
                                ?>
                                <a class="dropdown-item" href="#">Conta</a>
                                <a class="dropdown-item" href="#">Metodo Pagamento</a>
                                <a class="dropdown-item" href="#">Eventos</a>
                                <?php
                            };
                            ?>
                            <!-- <a class="dropdown-item" href="#">Algo mais aqui</a> -->
                        </div>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <?php
                    if (empty($_SESSION['UsuarioID'])) {
                    ?>
                        <a class="nav-link" href="<?= BASE_URL ?>auth/login.php">Login</a>
                    <?php
                    } else {
                    ?>
                        <a class="nav-link" href="<?= BASE_URL ?>auth/logout.php">Logout</a>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </nav>
    </header>