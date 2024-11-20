<?php

/**
 * Classe Logger para gerenciar o registro de mensagens em um arquivo de log.
 */
class Logger
{
    /**
     * @var string Caminho do arquivo de log.
     */
    private $logFile;

    /**
     * Construtor da classe Logger.
     * Define o caminho do arquivo de log e o fuso horário.
     * 
     * @param string $logFile Caminho do arquivo de log (opcional). 
     *                        Padrão: '../log/app.log'.
     */
    public function __construct($logFile = '../log/app.log')
    {
        $this->logFile = $logFile;
        date_default_timezone_set('America/Sao_Paulo'); // Define o fuso horário.
    }

    /**
     * Registra uma mensagem no arquivo de log.
     * 
     * @param string $message Mensagem a ser registrada.
     * @param string $level   Nível da mensagem (INFO, WARNING, ERROR).
     */
    private function log($message, $level = 'INFO')
    {
        $timestamp = date('Y-m-d H:i:s'); // Obtém o horário atual.
        $formattedMessage = "[$timestamp] [$level] $message" . PHP_EOL; // Formata a mensagem.
        file_put_contents($this->logFile, $formattedMessage, FILE_APPEND); // Grava no arquivo de log.
    }

    /**
     * Registra uma mensagem com nível INFO.
     * 
     * @param string $message Mensagem a ser registrada.
     */
    public function info($message)
    {
        $this->log($message, 'INFO');
    }

    /**
     * Registra uma mensagem com nível WARNING.
     * 
     * @param string $message Mensagem a ser registrada.
     */
    public function warning($message)
    {
        $this->log($message, 'WARNING');
    }

    /**
     * Registra uma mensagem com nível ERROR.
     * 
     * @param string $message Mensagem a ser registrada.
     */
    public function error($message)
    {
        $this->log($message, 'ERROR');
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
