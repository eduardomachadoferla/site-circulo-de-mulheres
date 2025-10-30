<?php
include('../admin/includes/config.inc.php');

if(!isset($_SESSION['name'])){
    header("Location: " . BASE_URL . "logim/index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Perfil do Usuário</title>
</head>
<style>
    /* Geral */
    body {
        background-color: #f0f2f5;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Navbar */
    .navbar {
        background-color: rgb(76, 7, 145);
        border-bottom: 2px solid #5b3a8e;
        padding: 0.5rem 1rem;
    }

    .navbar-brand {
        font-size: 1.75rem;
        font-weight: bold;
        color: #ffffff;
    }

    .nav-link {
        color: #ffffff;
        margin-right: 15px;
    }

    .nav-link:hover {
        color: #e3e3e3;
    }

    .navbar-nav {
        flex-direction: row;
    }

    .nav-item {
        margin-left: 15px;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler-icon {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"%3E%3Cpath stroke="%23ffffff" stroke-width="3" d="M5 7h20M5 15h20M5 23h20"%3E%3C/path%3E%3C/svg%3E');
    }

    /* Botão Histórico na Navbar */
    .history-button {
        background-color: rgb(76, 7, 145);
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .history-button:hover {
        background-color: #5b3a8e;
        transform: scale(1.05);
    }

    .history-button:focus {
        outline: none;
    }

    /* Perfil do Usuário */
    .profile-card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 20px;
    }

    .profile-card img {
        object-fit: cover;
        height: 250px;
        width: 100%;
    }

    .profile-card .card-body {
        padding: 20px;
    }

    .profile-card .card-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .profile-card .card-text {
        color: #555;
    }

    /* Detalhes e Edição do Perfil */
    .profile-details, .edit-form {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px;
    }

    .profile-details h3, .edit-form h3 {
        font-size: 1.75rem;
        font-weight: 600;
        color: rgb(76, 7, 145);
        margin-bottom: 15px;
    }

    .profile-details .list-group-item {
        font-size: 1rem;
        border: none;
        border-bottom: 1px solid #e3e3e3;
    }

    .edit-form .form-label {
        font-weight: 600;
        font-size: 1rem;
        color: #333;
    }

    .edit-form .form-control {
        font-size: 1rem;
        border-radius: 8px;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
    }

    .edit-form .btn-primary {
        background-color: rgb(76, 7, 145);
        border: none;
        color: #ffffff;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 1rem;
    }

    .edit-form .btn-primary:hover {
        background-color: #5b3a8e;
    }

    .edit-form .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: #ffffff;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 1rem;
    }

    .edit-form .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Histórico de Compras */
    .purchase-history {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px;
    }

    .purchase-history h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: rgb(76, 7, 145);
        margin-bottom: 15px;
    }

    .purchase-history .list-group-item {
        font-size: 1rem;
        border: none;
        border-bottom: 1px solid #e3e3e3;
    }

    /* Animações */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .profile-card img {
            height: 200px;
        }

        .profile-card .card-body {
            padding: 15px;
        }

        .profile-details, .edit-form, .purchase-history {
            padding: 15px;
        }

        .navbar-nav {
            flex-direction: column;
            align-items: center;
        }

        .nav-item {
            margin: 10px 0;
        }

        .history-button {
            margin-top: 10px;
        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand" href="#">Vendas Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a class="nav-link active" aria-current="page" href="../index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            </svg>
                            Início
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="history-button" onclick="toggleHistory()">Histórico</button>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="../index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M3.5 1.5a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0zM8 9a4.5 4.5 0 0 0-4.5 4.5V15h9v-1.5A4.5 4.5 0 0 0 8 9z" />
                            </svg>
                            inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path d="M11.5 8a.5.5 0 0 0-.354.146L9 9.793V7.5a.5.5 0 0 0-.5-.5H4a.5.5 0 0 0-.5.5v2.293L.854 8.146a.5.5 0 0 0-.708.708l2.5 2.5a.5.5 0 0 0 .708 0l2.5-2.5a.5.5 0 0 0 0-.708L1.146 6.646a.5.5 0 0 0-.708.708L3.5 9.5H2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h4.207l1.146 1.146a.5.5 0 0 0 .708 0l2.5-2.5a.5.5 0 0 0 0-.708l-2.5-2.5a.5.5 0 0 0-.708 0L5.207 7H8a.5.5 0 0 0 .5-.5v-2.293l1.146 1.146a.5.5 0 0 0 .708 0l2.5-2.5a.5.5 0 0 0 0-.708L12.207 5.5H14a.5.5 0 0 0 0-1h-3.5a.5.5 0 0 0-.5.5v3.5a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .207-.042l-2.146-2.146a.5.5 0 0 0-.708 0z" />
                            </svg>
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-card">
                    <img src="profile-image.jpg" alt="Profile Image">
                    <div class="card-body">
                        <h5 class="card-title">Nome do Usuário</h5>
                        <p class="card-text">Descrição do perfil ou breve biografia.</p>
                        <button class="btn btn-primary" onclick="toggleEditForm()">Editar Perfil</button>
                    </div>
                </div>
                <div id="purchase-history" class="purchase-history" style="display: none;">
                    <h3>Histórico de Compras</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Compra 1 - Data: 01/01/2024</li>
                        <li class="list-group-item">Compra 2 - Data: 15/01/2024</li>
                        <li class="list-group-item">Compra 3 - Data: 28/01/2024</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-details" id="profile-details">
                    <h3>Detalhes do Perfil</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Email: usuario@exemplo.com</li>
                        <li class="list-group-item">Telefone: (11) 99999-9999</li>
                        <li class="list-group-item">Endereço: Rua Exemplo, 123, Cidade</li>
                    </ul>
                </div>

                <div class="edit-form" id="edit-form" style="display: none;">
                    <h3>Editar Perfil</h3>
                    <form action="update-profile.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="Nome do Usuário">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="usuario@exemplo.com">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="(11) 99999-9999">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="address" name="address" value="Rua Exemplo, 123, Cidade">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="button" class="btn btn-secondary" onclick="toggleEditForm()">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleHistory() {
            var history = document.getElementById('purchase-history');
            if (history.style.display === 'none' || history.style.display === '') {
                history.style.display = 'block';
                history.classList.add('fade-in');
            } else {
                history.style.display = 'none';
            }
        }

        function toggleEditForm() {
            var editForm = document.getElementById('edit-form');
            var profileDetails = document.getElementById('profile-details');

            if (editForm.style.display === 'none' || editForm.style.display === '') {
                editForm.style.display = 'block';
                profileDetails.style.display = 'none';
            } else {
                editForm.style.display = 'none';
                profileDetails.style.display = 'block';
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
