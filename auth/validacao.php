<?php
// var_dump($_POST);

require_once '../config/Classes/Banco.php';
require_once '../config/log/log.php';


// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) and (empty($_POST['email']) or empty($_POST['senha']))) {
    // $logger = new Logger();
    header("Location: ../login.php");
    exit;
}

$usuario = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM bd_usuario where email = '$usuario' and senha_hash = '$senha' LIMIT 1";
$resultado = Banco::query($sql);

// var_dump($resultado);
try {
    // Verifique se o resultado está vazio ou não é um array associativo
    if (!empty($resultado) && isset($resultado[0])) {
        $dadosUsuario = $resultado[0]; // Extrai o primeiro registro

        if ($dadosUsuario['email'] === $usuario && $dadosUsuario['senha_hash'] === $senha) {
            if (!isset($_SESSION)) session_start();

            // Salva os dados encontrados na sessão
            $_SESSION['UsuarioID'] = $dadosUsuario['id'] ?? null;
            $_SESSION['UsuarioNome'] = $dadosUsuario['nome'] ?? 'Usuário Desconhecido';

            echo $_SESSION['UsuarioNome'];

            // Redireciona o visitante
            header("Location: ../index.php");
            exit;
        } else {
            echo "Email ou senha inválidos!";
        }
    } else {
        echo "Login Inválido!";
    }
} catch (Exception $e) {
    // Capture a exceção e mostre a mensagem de erro
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}
