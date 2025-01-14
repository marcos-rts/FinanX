<?php
include '../config/log/log.php';

$logger = new Logger();
session_start(); // Inicia a sessão
session_destroy(); // Destrói a sessão limpando todos os valores salvos
$logger->info('Usuario deslogado');
header("Location: ../index.php");
exit; // Redireciona o visitante
?>