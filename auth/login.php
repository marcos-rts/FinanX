<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("../assets/img/background.png"); /* Substitua pela URL da sua imagem */
            background-size: cover; /* Faz a imagem cobrir toda a tela */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Evita repetição da imagem */
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo semi-transparente */
            border-radius: 10px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h3 class="text-center mb-4">Login</h3>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
                <div class="mt-3 text-center">
                    <small>
                        Não tem uma conta? <a href="#">Registre-se</a>
                    </small>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>