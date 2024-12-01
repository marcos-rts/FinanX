<?php
include(__DIR__ . '/../log/log.php'); // Caminho absoluto baseado no diretório atual
// Definição classe Banco
// Classe Banco aprimorada com melhorias na lógica de logs
class Banco
{
    private static $DB_nome = 'finanx'; // Nome do banco de dados
    private static $DB_host = 'localhost'; // Endereço host do banco de dados
    private static $DB_port = '3306'; // Porta personalizada
    private static $DB_usuario = 'root'; // Nome de usuário
    private static $DB_senha = ''; // Senha do usuário
    private static $cont = null; // Variável estática privada para armazenar a conexão com o banco de dados
    private static $logger; // Criação de uma instância do Logger como estática

    private function __construct()
    {
        // Inicializa o Logger apenas uma vez
        self::initLogger();
    }

    // Método para inicializar o Logger, usado internamente
    private static function initLogger()
    {
        if (self::$logger === null) {
            self::$logger = new Logger();
            self::$logger->info('Logger inicializado');
        }
    }

    public static function conectar()
    {
        self::initLogger();

        if (self::$cont === null) {
            try {
                $parametros = "mysql:host=" . self::$DB_host . ";port=" . self::$DB_port . ";dbname=" . self::$DB_nome;
                self::$cont = new PDO($parametros, self::$DB_usuario, self::$DB_senha);
                self::$logger->info('Conexão com o banco estabelecida. ', ['host' => self::$DB_host, 'db' => self::$DB_nome]);
            } catch (PDOException $exception) {
                self::$logger->error('Erro ao conectar ao banco.', ['mensagem' => $exception->getMessage()]);
                die($exception->getMessage());
            }
        }

        return self::$cont;
    }

    public static function desconectar()
    {
        self::initLogger();

        if (self::$cont !== null) {
            self::$cont = null;
            self::$logger->info('Conexão com o banco encerrada.');
        }
    }

    public static function query($sql)
    {
        self::initLogger();

        try {
            $conn = self::conectar();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            self::$logger->info('Query executada com sucesso.', [
                'sql' => $sql,
                'resultados' => count($resultados)
            ]);

            return $resultados;
        } catch (PDOException $exception) {
            self::$logger->error('Erro ao executar a query.', [
                'sql' => $sql,
                'mensagem' => $exception->getMessage()
            ]);
            die($exception->getMessage());
        }
    }

    public static function installDb()
    {
        self::initLogger();

        try {
            $conn = self::conectar();
            $sqlFilePath = '../../config/database/db_completo.sql';

            if (!file_exists($sqlFilePath)) {
                $mensagem = "Arquivo .sql não encontrado: $sqlFilePath";
                self::$logger->error($mensagem);
                throw new Exception($mensagem);
            }

            $sqlContent = file_get_contents($sqlFilePath);
            $queries = explode(";", $sqlContent);

            foreach ($queries as $query) {
                $query = trim($query);
                if (!empty($query)) {
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                }
            }

            self::$logger->info('Arquivo .sql executado com sucesso.', ['caminho' => $sqlFilePath]);
        } catch (Exception $e) {
            self::$logger->error('Erro durante a instalação do banco.', [
                'mensagem' => $e->getMessage()
            ]);
        }
    }
}
