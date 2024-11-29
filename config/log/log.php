<?php

/**
 * Classe Logger para registrar mensagens em um arquivo de log.
 */
class Logger
{
    private $logFile; // Caminho do arquivo de log.

    /**
     * Construtor para inicializar o Logger com o caminho do arquivo de log.
     * @param string $logFile Caminho do arquivo de log. Padrão: '../log/app.log'.
     */
    public function __construct($logFile = '../../config/log/app.log')
    {
        $this->logFile = $logFile;
        date_default_timezone_set('America/Sao_Paulo');
    }

    /**
     * Registra uma mensagem no log com informações adicionais.
     * @param string $message Mensagem de log.
     * @param string $level Nível da mensagem (INFO, WARNING, ERROR).
     * @param array|null $context Dados adicionais (opcional).
     */
    private function log($message, $level = 'INFO', array $context = null)
    {
        $timestamp = date('Y-m-d H:i:s');
        $formattedMessage = "[$timestamp] [$level] $message";

        // Adicionar o contexto ao log, se disponível.
        if ($context) {
            $contextString = json_encode($context, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            $formattedMessage .= " | Contexto: $contextString";
        }

        $formattedMessage .= PHP_EOL;
        file_put_contents($this->logFile, $formattedMessage, FILE_APPEND);
    }

    public function info($message, array $context = null)
    {
        $this->log($message, 'INFO', $context);
    }

    public function warning($message, array $context = null)
    {
        $this->log($message, 'WARNING', $context);
    }

    public function error($message, array $context = null)
    {
        $this->log($message, 'ERROR', $context);
    }
}


# =================== Exemplo de Uso ===================

/*
 * Instancie o Logger (o arquivo padrão será '../log/app.log').
 * Caso precise personalizar o caminho do arquivo, passe como argumento.
 */

// $logger = new Logger();
// $logger->info('Mensagem de informação.');
// $logger->warning('Mensagem de aviso.');
// $logger->error('Mensagem de erro.');
