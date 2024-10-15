<?php
require_once './Classes/Banco.php';
// Banco::conectar();


// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST['categoria'];

    $banco = new Banco();

    // Inserir o categoria no banco de dados
    $sql = "INSERT INTO tabela_cadastro (categoria) VALUES ('$categoria')";

    $banco->query($sql);
}
?>
