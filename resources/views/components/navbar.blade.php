<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Aprendizado Online</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<style>/* Estilos do cabeçalho */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: #333;
        color: #fff;
    }

    .header h1 {
        font-size: 1.5rem;
    }

    nav ul {
        list-style: none;
        display: flex;
    }

    nav ul li {
        margin-right: 20px;
    }

    nav a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        font-size: 1rem;
    }

    /* Estilos dos botões de autenticação */
    .auth-buttons {
        display: flex;
        align-items: center;
    }

    .auth-links {
        display: flex;
        align-items: center;
        margin-left: 20px;
    }

    .auth-link {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        margin-right: 10px;
        transition: color 0.3s;
    }

    .auth-link:hover {
        color: #ccc;
    }

    .auth-link-register {
        background-color: #fff;
        color: #333;
        padding: 8px 16px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .auth-link-register:hover {
        background-color: #333;
        color: #fff;
    }
    </style>
    <header class="header">
        <h1>Sistema de Aprendizado Online</h1>
        <nav>
            <ul>
                <li><a href="#">Início</a></li>
                <li><a href="#">Cursos</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            @if (Route::has('login'))
                <div class="auth-links">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="auth-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="auth-link">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="auth-link auth-link-register">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>
    <!-- Seu conteúdo principal aqui -->
</body>
</html>
