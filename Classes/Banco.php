<?php
include './log/log.php';
// Definição classe Banco
class Banco
{
    private static $DB_nome = 'finanx_beta'; // Nome do banco de dados
    private static $DB_host = 'localhost'; // Endereço host do banco de dados
    private static $DB_port = '3306'; // Porta personalizada
    private static $DB_usuario = 'root'; // Nome de usuário
    private static $DB_senha = ''; // Senha do usuário
    // -----------------------------------------------------------------------------------
    private static $cont = null; // Variável estática privada para armazenar a conexão com o banco de dados
    private static $logger; // Criação de uma instância do Logger como estática

    // Construtor privado para evitar a instância da classe diretamente
    private function __construct()
    {
        // Inicializar o Logger
        if (self::$logger === null) {
            self::$logger = new Logger();
            self::$logger->info('Logger inicializado');
        }
        // Construtor agora é público, permitindo a criação de instâncias
        // self::$logger->info('Instancia criada');
    }

    // Método estático para conectar ao banco de dados
    public static function conectar()
    {
        // Inicializa o Logger
        if (self::$logger === null) {
            self::$logger = new Logger();
        }

        // Verifica se a conexão ainda não foi estabelecida
        if (null == self::$cont) {
            try {
                // Monta a string de conexão (DSN)
                $parametros = "mysql:host=" . self::$DB_host . ";port=" . self::$DB_port . ";dbname=" . self::$DB_nome;
                // Cria uma nova instância de PDO
                self::$cont = new PDO($parametros, self::$DB_usuario, self::$DB_senha);
                self::$logger->info('Conectado ao banco de dados ' . self::$DB_host);
            } catch (PDOException $exception) {
                // Em caso de erro na conexão
                self::$logger->error('Erro ao conectar ao banco de dados: ' . $exception->getMessage());
                die($exception->getMessage());
            }
        }
        // Retorna a conexão estabelecida
        return self::$cont;
    }

    // Método estático para desconectar do banco de dados
    public static function desconectar()
    {
        self::$cont = null;
        self::$logger->info('Desconectado do banco de dados');
    }

    // Função para executar uma query SQL e retornar o resultado
    public static function query($sql)
    {
        // Inicializa o Logger
        if (self::$logger === null) {
            self::$logger = new Logger();
        }

        try {
            // Estabelece a conexão automaticamente
            $conn = self::conectar();

            // Preparar a query
            $stmt = $conn->prepare($sql);
            // Executar a query
            $stmt->execute();

            // Log da execução da query
            self::$logger->info('Query executada: ' . $sql);

            // Retornar todos os resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            self::$logger->info('Query executada com sucesso. Total de resultados: ' . count($resultados));
            return $resultados;
        } catch (PDOException $exception) {
            // Em caso de erro, retornar a mensagem
            self::$logger->error('Erro ao executar a query: ' . $exception->getMessage());
            die($exception->getMessage());
        }
    }

    public static function installDb()
    {
        // Inicializa o Logger
        if (self::$logger === null) {
            self::$logger = new Logger();
        }

        try {
            // Estabelece a conexão automaticamente
            $conn = self::conectar();

            // Caminho para o arquivo .sql
            $sqlFilePath = './DB/BD_completo_beta.sql';

            // Verifica se o arquivo .sql existe
            if (!file_exists($sqlFilePath)) {
                throw new Exception("Arquivo .sql não encontrado: $sqlFilePath");
                self::$logger->error("Arquivo .sql não encontrado: " . $sqlFilePath);
            }

            // Lê o conteúdo do arquivo .sql
            $sqlContent = file_get_contents($sqlFilePath);

            // Divide o conteúdo em comandos SQL individuais
            $queries = explode(";", $sqlContent);

            // Executa cada comando individualmente
            foreach ($queries as $query) {
                $query = trim($query); // Remove espaços em branco extras
                if (!empty($query)) { // Ignora comandos vazios
                    // $pdo->exec($query);
                    // Preparar a query
                    $stmt = $conn->prepare($query);
                    // Executar a query
                    $stmt->execute();

                    // Retornar todos os resultados
                    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    self::$logger->info('Query executada com sucesso. Total de resultados: ' . count($resultados));
                }
            }
            echo "Arquivo .sql executado com sucesso!";
            self::$logger->info("Arquivo .sql executado com sucesso!");
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
            self::$logger->error("Erro de conexão: " . $e->getMessage());
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
            self::$logger->error("Erro: " . $e->getMessage());
        }
    }
}
