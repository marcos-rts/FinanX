<?php
// var_dump($_POST);

require_once '../config/Classes/Banco.php';
require_once '../config/log/log.php';

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
    header("Location: ../login.php"); 
    exit;
}

$usuario = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM bd_usuario LIMIT 1";
$resultado = Banco::query($sql);

// var_dump ($resultado);
try {
    // Verifique se o resultado está vazio ou não é um array associativo
    if (empty($resultado) || !is_array($resultado) || !isset($resultado[0])) {
        echo "Login Inválido!"; 
        exit;
    }

    // Extrai o primeiro resultado da consulta
    $dadosUsuario = $resultado[0];

    if (!isset($_SESSION)) session_start();

    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $dadosUsuario['id'] ?? null; // Garantia contra chave inexistente
    $_SESSION['UsuarioNome'] = $dadosUsuario['nome'] ?? 'Usuário Desconhecido';

    echo $_SESSION['UsuarioNome'];

    // Redireciona o visitante
    header("Location: ../index.php"); 
    exit;
} catch (Exception $e) {
    // Capture a exceção e mostre a mensagem de erro
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}
?>
