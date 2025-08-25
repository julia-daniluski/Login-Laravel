<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Área Logada</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
/* Fundo e layout geral */
body {
    background-image: url('https://wallpaper.forfun.com/fetch/34/343e8efa96951c134cd49c5b124a17fa.jpeg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    font-family: Arial, sans-serif;
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding: 50px 20px;
    color: #fff;
    text-align: center;
    background-attachment: fixed;
}

/* Sombra leve para melhorar legibilidade */
body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.4);
    z-index: -1;
}

/* Título */
h1 {
    font-size: 2.5rem;
    font-weight: bold;
    text-transform: uppercase;
    text-shadow: 0 0 5px #fff, 0 0 15px #00ff99, 0 0 30px #00ff99;
    margin-bottom: 30px;
}

/* Container do conteúdo */
.container {
    background-color: rgba(0,0,0,0.5);
    border-radius: 15px;
    padding: 30px;
    max-width: 800px;
    box-shadow: 0 0 20px #00ff99;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

/* Imagem */
.container img {
    max-width: 200px;
    border-radius: 50%;
    border: 3px solid #00ff99;
    box-shadow: 0 0 15px #00ff99;
}

/* Parágrafos */
p {
    font-size: 1rem;
    line-height: 1.6;
    color: #fff;
    text-align: justify;
}

/* Labels */
label {
    font-size: 0.9rem;
    font-weight: bold;
    text-transform: uppercase;
    text-shadow: 0 0 5px #fff, 0 0 20px #00ff99, 0 0 30px #00ff99;
}

/* Botões personalizados */
.custom-button, .btn-logout {
    background-color: #00ff99;
    color: #000;
    font-weight: bold;
    border: none;
    padding: 10px 25px;
    font-size: 1.1rem;
    border-radius: 10px;
    transition: all 0.3s;
    cursor: pointer;
    box-shadow: 0 0 10px #00ff99;
}

.custom-button:hover, .btn-logout:hover {
    background-color: #145c16ff;
    color: #fff;
    box-shadow: 0 0 20px #00ff99;
}

/* Botão logout separado */
form {
    margin-top: 30px;
}

/* Responsividade */
@media(max-width: 600px) {
    h1 { font-size: 2rem; }
    .container { padding: 20px; }
    .container img { max-width: 150px; }
}
</style>
</head>
<body>
</head>
<body>
    <h1>Parabéns! Você está logado, {{ auth()->user()->name }}!</h1>
<div class="container">
    <img src="https://preview.redd.it/50f796d9u8691.jpg?width=640&crop=smart&auto=webp&s=9e6fbbcd0c7ec64d8062cca60fa234f3a51a6f07" alt="Tiana Princesa e o Sapo">
    <p>Tiana, protagonista de A Princesa e o Sapo (2009), é uma das princesas mais marcantes da Disney, conhecida por sua determinação, coragem e espírito empreendedor. Diferente de muitas princesas clássicas, Tiana sonha em abrir seu próprio restaurante em Nova Orleans, mostrando que ambição, trabalho duro e perseverança são caminhos para conquistar seus objetivos.

O filme se passa em uma vibrante cidade cheia de música, cultura e magia do sul dos Estados Unidos. Quando Tiana conhece o príncipe transformado em sapo, Naveen, ela se envolve em uma aventura encantadora repleta de feitiços, jazz e desafios, aprendendo sobre amor, amizade e a importância de equilibrar sonhos e coração.

Tiana representa a força e a independência feminina, sendo a primeira princesa afro-americana da Disney. Seu filme se destaca não apenas pela animação e pela música cativante, mas também por transmitir mensagens de empoderamento, coragem e autenticidade, inspirando crianças e adultos a acreditarem em si mesmos e em seus sonhos.</p>
</div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger btn-logout">Sair</button>
    </form>

    <!-- Opcional: script para evitar reenvio de formulário -->
    <script>
        const logoutForm = document.querySelector('form');
        logoutForm.addEventListener('submit', function() {
            logoutForm.querySelector('button').disabled = true;
        });
    </script>
</body>
</html>

