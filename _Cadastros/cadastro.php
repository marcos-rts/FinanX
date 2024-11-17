<?php
require_once '../Classes/Banco.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST['categoria'];
    // Inserir o categoria no banco de dados
    $sql = "INSERT INTO categoria (nome) VALUES ('$categoria')";

    Banco::query($sql);
}
?>
