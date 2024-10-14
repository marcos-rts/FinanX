<?php
// Definição classe Banco
class Banco
{
    private static $DB_nome = 'RTS_IntegraX'; // Nome do banco de dados
    private static $DB_host = 'localhost'; // Endereço host do banco de dados
    private static $DB_port = '3306'; // Porta personalizada
    private static $DB_usuario = 'integrax_bd'; // Nome de usuário
    private static $DB_senha = '8GX1WAUJ8A'; // Senha do usuário

    // Variável estática privada para armazenar a conexão com o banco de dados
    private static $cont = null;

    // Construtor privado para evitar a instância da classe diretamente
    private function __construct()
    {
        die('A função não é permitido');
    }

    // Método estático para conectar ao banco de dados
    public static function conectar()
    {
        // Verifica se a conexão ainda não foi estabelecida
        if (null == self::$cont) {
            try {
                // Monta a string de conexão (DSN)
                $parametros = "mysql:host=" . self::$DB_host . ";port=" . self::$DB_port . ";dbname=" . self::$DB_nome;
                // Cria uma nova instância de PDO
                self::$cont = new PDO($parametros, self::$DB_usuario, self::$DB_senha);
            } catch (PDOException $exception) {
                // Em caso de erro na conexão
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
    }

    // Função para executar uma query SQL e retornar o resultado
    public static function query($sql){
        try{
            // Conectar ao banco de dados
            $conn self::conectar();
            // Preparar a query
            $stmt = $conn->prepare($sql);
            // Executar a query
            $stmt ->execute();
            // Retornar todos os resultados
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // Em caso de erro, retornar a mensagem
            die($exception->getMessage())
        }
    }
}
?>