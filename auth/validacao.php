<?php
// var_dump($_POST);

require_once '../config/Classes/Banco.php';
require_once '../config/log/log.php';

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
    header("Location: login.php"); exit;
}

$usuario = $_POST['email'];
$senha = $_POST['senha'];

$sql = "select * from bd_usuario LIMIT 1";
$resultado = Banco::query($sql);

// var_dump ($resultado);
try {
    // Verifique se o array está vazio
    if (empty($resultado)) {
        echo "Login Invalido!"; exit;
    }
    // Se não estiver vazio, continue normalmente
    if (!isset($_SESSION)) session_start();

    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $resultado['id'];
    $_SESSION['UsuarioNome'] = $resultado['nome'];

    // Redireciona o visitante
    header("Location: ../index.php"); exit;
} catch (Exception $e) {
    // Capture a exceção e mostre a mensagem de erro
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}


?>