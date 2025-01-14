<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Container Principal -->
    <div class="container my-4">
        <!-- Cabeçalho -->
        <div class="mb-4">
            <h1 class="h4 text-center">Relatório de Transações</h1>
            <p class="text-muted text-center">Use os filtros abaixo para gerar o relatório.</p>
        </div>

        <!-- Filtros -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form class="row g-3">
                    <!-- Categoria -->
                    <div class="col-md-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select id="categoria" class="form-select">
                            <option selected>Selecione...</option>
                            <option value="1">Alimentação</option>
                            <option value="2">Transporte</option>
                            <option value="3">Lazer</option>
                        </select>
                    </div>
                    <!-- Subcategoria -->
                    <div class="col-md-3">
                        <label for="subcategoria" class="form-label">Subcategoria</label>
                        <select id="subcategoria" class="form-select">
                            <option selected>Selecione...</option>
                            <option value="1">Restaurantes</option>
                            <option value="2">Combustível</option>
                            <option value="3">Cinema</option>
                        </select>
                    </div>
                    <!-- Mês -->
                    <div class="col-md-2">
                        <label for="mes" class="form-label">Mês</label>
                        <select id="mes" class="form-select">
                            <option selected>Selecione...</option>
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Março</option>
                            <!-- Adicione os meses restantes -->
                        </select>
                    </div>
                    <!-- Ano -->
                    <div class="col-md-2">
                        <label for="ano" class="form-label">Ano</label>
                        <select id="ano" class="form-select">
                            <option selected>Selecione...</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <!-- Botão Filtrar -->
                    <div class="col-md-2 align-self-end">
                        <button type="button" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabela de Relatório -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Resultados</h5>
                    <button class="btn btn-success btn-sm">Exportar CSV</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Categoria</th>
                                <th>Subcategoria</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Alimentação</td>
                                <td>Restaurantes</td>
                                <td>Jantar no restaurante X</td>
                                <td>15/11/2024</td>
                                <td>R$ 120,00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Transporte</td>
                                <td>Combustível</td>
                                <td>Abastecimento</td>
                                <td>10/11/2024</td>
                                <td>R$ 300,00</td>
                            </tr>
                            <!-- Adicione mais linhas conforme necessário -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-3 border-top">
        <p class="mb-0 text-muted">&copy; 2024 Sistema de Gestão</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
