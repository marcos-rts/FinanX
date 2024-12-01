<?php
require_once '../../../config/Classes/User.php';
require_once '../../../config/log/log.php';
include '../../../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['senha'] == $_POST['confirmarSenha']) {
        $result = Users::addUser($_POST);
        echo "Usuario adicionado";
    } else {
        echo "Senha diferente";
    }
}


?>
<div class="container mt-5">
    <!-- Título da Página -->
    <div class="text-center mb-4">
        <h1 class="h4">Criar Novo Usuário</h1>
        <p class="text-muted">Preencha os campos abaixo para adicionar um novo usuário ao sistema.</p>
    </div>

    <!-- Formulário de Criação de Usuário -->
    <form class="shadow-sm p-4 rounded border" method="$_POST">
        <!-- Nome Completo -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" nane="nome" placeholder="Digite o nome completo" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail do usuário" required>
        </div>

        <!-- Telefone (Opcional) -->
        <!-- <div class="mb-3">
                <label for="telefone" class="form-label">Telefone (Opcional)</label>
                <input type="tel" class="form-control" id="telefone" placeholder="(00) 00000-0000">
            </div> -->

        <!-- Função e Status -->
        <div class="row mb-3">
            <!-- Função -->
            <div class="col-md-6">
                <label for="Tipo" class="form-label">Função</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option selected disabled>Selecione a função do usuário</option>
                    <option value="Admin">Administrador</option>
                    <option value="Comum">Comun</option>
                    <!-- <option value="visualizador">Visualizador</option> -->
                </select>
            </div>

            <!-- Status -->
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ativo" name="status" value="true" required>
                        <label class="form-check-label" for="ativo">Ativo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inativo" name="status" value="false">
                        <label class="form-check-label" for="inativo">Inativo</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Senha e Confirmar Senha -->
        <div class="row mb-3">
            <!-- Senha -->
            <div class="col-md-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha" required>
            </div>

            <!-- Confirmar Senha -->
            <div class="col-md-6">
                <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" placeholder="Repita a senha" required>
            </div>
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-between">
            <a href="configuracoes.html" class="btn btn-outline-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Criar Usuário</button>
        </div>
    </form>
</div>

<!-- Rodapé -->
<footer class="text-center mt-5 py-3 border-top">
    <p class="mb-0 text-muted">&copy; 2024 Sistema de Gestão</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>