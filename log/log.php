<?php

class Logger {
    private $logFile;

    public function __construct($logFile = 'log/app.log') {
        $this->logFile = $logFile;
    }

    public function log($message, $level = 'INFO') {
        $timestamp = date('Y-m-d H:i:s');
        $formattedMessage = "[$timestamp] [$level] $message" . PHP_EOL;

        file_put_contents($this->logFile, $formattedMessage, FILE_APPEND);
    }

    public function info($message) {
        $this->log($message, 'INFO');
    }

    public function warning($message) {
        $this->log($message, 'WARNING');
    }

    public function error($message) {
        $this->log($message, 'ERROR');
    }
}

// Exemplo de uso:
// $logger = new Logger();

// Registrando diferentes níveis de log
// $logger->info('Este é um log de informação.');
// $logger->warning('Este é um log de aviso.');
// $logger->error('Este é um log de erro.');
