<?php

// Definindo a classe Logger, que gerencia o registro de mensagens em um arquivo de log
class Logger {
    // Propriedade privada para armazenar o caminho do arquivo de log
    private $logFile;

    // Construtor da classe, que define o caminho do arquivo de log
    // Por padrão, usa '../log/app.log' se nenhum caminho for fornecido
    public function __construct($logFile = '../log/app.log') {
        $this->logFile = $logFile; // Atribui o caminho do arquivo à propriedade logFile
    }

    // Método para registrar uma mensagem de log com um nível especificado
    public function log($message, $level = 'INFO') {
        // Obtendo o timestamp atual no formato 'Y-m-d H:i:s'
        $timestamp = date('Y-m-d H:i:s');
        // Formatando a mensagem de log com o timestamp, nível e mensagem
        $formattedMessage = "[$timestamp] [$level] $message" . PHP_EOL;

        // Escrevendo a mensagem formatada no arquivo de log, anexando ao final do arquivo
        file_put_contents($this->logFile, $formattedMessage, FILE_APPEND);
    }

    // Método para registrar uma mensagem com nível INFO
    public function info($message) {
        $this->log($message, 'INFO'); // Chama o método log com nível 'INFO'
    }

    // Método para registrar uma mensagem com nível WARNING
    public function warning($message) {
        $this->log($message, 'WARNING'); // Chama o método log com nível 'WARNING'
    }

    // Método para registrar uma mensagem com nível ERROR
    public function error($message) {
        $this->log($message, 'ERROR'); // Chama o método log com nível 'ERROR'
    }
}

// Exemplo de uso:
// Cria uma nova instância da classe Logger, que irá usar o caminho padrão do arquivo de log
// $logger = new Logger();

// Registrando diferentes níveis de log:
// $logger->info('Este é um log de informação.'); // Log de nível INFO
// $logger->warning('Este é um log de aviso.'); // Log de nível WARNING
// $logger->error('Este é um log de erro.'); // Log de nível ERROR
