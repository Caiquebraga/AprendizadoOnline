<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <style>
    /* Reset de estilos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilo global */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    color: #333;
    line-height: 1.6;
}

/* Estilos do cabeçalho */
header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    font-size: 2rem;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

/* Estilos da seção de destaque */
.hero {
    text-align: center;
    padding: 50px 0;
}

.hero h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 30px;
}

.cta-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.cta-button:hover {
    background-color: #555;
}

/* Estilos dos cursos em destaque */
.featured-courses {
    text-align: center;
    padding: 40px 0;
}

.featured-courses h2 {
    font-size: 2rem;
    margin-bottom: 30px;
}

.course {
    display: inline-block;
    margin: 0 20px;
    text-align: left;
}

.course img {
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.course h3 {
    font-size: 1.5rem;
    margin-top: 10px;
}

.course p {
    margin-top: 10px;
}

/* Estilos do rodapé */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}
/* Estilização para todas as imagens */
/* Estilização para todas as imagens */
img {
    width: 200px; /* Defina a largura desejada */
    height: 150px; /* Defina a altura desejada */
    object-fit: cover; /* Define como a imagem deve se ajustar ao contêiner (pode usar 'cover', 'contain', etc.) */
}



    </style>
    <body>
        <x-navbar></x-navbar>
        <section class="hero">
            <h2>Bem-vindo ao nosso sistema de aprendizado online</h2>
            <p>Transforme seu conhecimento e alcance seus objetivos de aprendizado conosco.</p>
            <a href="#" class="cta-button">Comece Agora</a>
        </section>

        <section class="featured-courses">
            <h2>Cursos em Destaque</h2>
            <div class="course">
                <img src="img/logicaprog.png" alt="Curso 1">
                <h3>Logica de programção</h3>
                <p>Descrição do Curso 1.</p>
                <a href="#" class="cta-button">Saiba Mais</a>
            </div>
            <div class="course">
                <img src="img/php.jpg" alt="Curso 2">
                <h3>Php com PDO</h3>
                <p>Descrição do Curso 2.</p>
                <a href="#" class="cta-button">Saiba Mais</a>
            </div>
            <!-- Adicione mais cursos aqui -->
        </section>
    </body>
</html>

