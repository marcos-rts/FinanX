<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Transações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Container Principal -->
    <div class="container-fluid p-4">
        <!-- Cabeçalho -->
        <div class="mb-4">
            <h1 class="h3 text-center">Dashboard de Transações</h1>
            <p class="text-muted text-center">Visualize as informações financeiras de forma clara e organizada</p>
        </div>

        <!-- Resumo de Informações -->
        <div class="row mb-4">
            <!-- Total de Transações -->
            <div class="col-md-3">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total de Transações</h5>
                        <p class="h3">250</p>
                    </div>
                </div>
            </div>
            <!-- Total Entradas -->
            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total de Entradas</h5>
                        <p class="h3">R$ 15.000,00</p>
                    </div>
                </div>
            </div>
            <!-- Total Saídas -->
            <div class="col-md-3">
                <div class="card text-white bg-danger shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total de Saídas</h5>
                        <p class="h3">R$ 9.500,00</p>
                    </div>
                </div>
            </div>
            <!-- Saldo Atual -->
            <div class="col-md-3">
                <div class="card text-white bg-dark shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Saldo Atual</h5>
                        <p class="h3">R$ 5.500,00</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico e Tabela -->
        <div class="row">
            <!-- Gráfico (Placeholder) -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Gráfico de Transações</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <p class="text-muted">Gráfico Placeholder - Insira um gráfico dinâmico aqui</p>
                            <div style="width:100%; height:250px; background-color:#f8f9fa; border:1px dashed #ccc; display:flex; justify-content:center; align-items:center;">
                                <span class="text-muted">Gráfico Aqui</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabela de Transações -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Últimas Transações</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Compra no Mercado</td>
                                    <td>Saída</td>
                                    <td>R$ 250,00</td>
                                    <td><span class="badge bg-success">Concluído</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Salário</td>
                                    <td>Entrada</td>
                                    <td>R$ 5.000,00</td>
                                    <td><span class="badge bg-success">Concluído</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Conta de Luz</td>
                                    <td>Saída</td>
                                    <td>R$ 180,00</td>
                                    <td><span class="badge bg-warning text-dark">Pendente</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Reembolso Viagem</td>
                                    <td>Entrada</td>
                                    <td>R$ 600,00</td>
                                    <td><span class="badge bg-success">Concluído</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="text-center py-3 border-top">
        <p class="mb-0 text-muted">&copy; 2024 Sistema de Gestão</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
