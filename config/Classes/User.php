<?php
require_once(__DIR__ . '/Config.php');
include(__DIR__ . '/../log/log.php'); // Caminho absoluto baseado no diretório atual



class Users
{
    // private static function connectDB() {
    //     try {
    //         $pdo = new PDO(DB_DSN, DB_USER, DB_PASS); // As constantes devem estar no seu arquivo Config.php
    //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $pdo;
    //     } catch (PDOException $e) {
    //         Log::write("Database Connection Error: " . $e->getMessage());
    //         die("Erro ao conectar ao banco de dados.");
    //     }
    // }

    public static function addUser($informacoes)
    {
        if (empty($informacoes['nome']) || empty($informacoes['email'])) {
            return "Informações incompletas.";
        }
        $nome = trim($informacoes['nome']);
        $email = trim($informacoes['email']);
        $senha = trim($informacoes['senha']);
        $tipo = trim($informacoes['tipo']);
        $status = trim($informacoes['status']);

        $sql = "INSERT INTO db_usuario (nome, email, senha_hash, tipo, ativo) VALUES ('$nome', '$email', '$senha', '$tipo', '$status')";
        try {

            Banco::query($sql);
            echo "<div class='alert alert-success'>Usuario cadastrado com sucesso!</div>";
        } catch (PDOException $e) {
            return "Erro ao adicionar usuário.";
        }
    }

    public static function listUser()
    {
        // $db = self::connectDB();
        // $sql = "SELECT id, nome, email FROM users";
        // try {
        //     $stmt = $db->query($sql);
        //     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     return $users;
        // } catch (PDOException $e) {
        //     Log::write("Erro ao listar usuários: " . $e->getMessage());
        //     return [];
        // }
    }

    public static function updateUser($id, $informacoes)
    {
        // if (empty($id) || empty($informacoes)) {
        //     Log::write("Erro: ID ou informações inválidas para atualizar usuário.");
        //     return "Dados inválidos.";
        // }

        // $db = self::connectDB();
        // $sql = "UPDATE users SET nome = :nome, email = :email WHERE id = :id";
        // try {
        //     $stmt = $db->prepare($sql);
        //     $stmt->execute([
        //         ':nome' => $informacoes['nome'],
        //         ':email' => $informacoes['email'],
        //         ':id' => $id
        //     ]);
        //     return "Usuário atualizado com sucesso!";
        // } catch (PDOException $e) {
        //     Log::write("Erro ao atualizar usuário: " . $e->getMessage());
        //     return "Erro ao atualizar usuário.";
        // }
    }

    public static function deleteUser($id)
    {
        // if (empty($id)) {
        //     Log::write("Erro: ID inválido para excluir usuário.");
        //     return "ID inválido.";
        // }

        // $db = self::connectDB();
        // $sql = "DELETE FROM users WHERE id = :id";
        // try {
        //     $stmt = $db->prepare($sql);
        //     $stmt->execute([':id' => $id]);
        //     return "Usuário excluído com sucesso!";
        // } catch (PDOException $e) {
        //     Log::write("Erro ao excluir usuário: " . $e->getMessage());
        //     return "Erro ao excluir usuário.";
        // }
    }
}
