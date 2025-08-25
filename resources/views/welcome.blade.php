<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap ícones -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <title>Login Laravel</title>

            <style>
        body {
            background-image: url('https://wallpaper.forfun.com/fetch/34/343e8efa96951c134cd49c5b124a17fa.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }

        h1 {
            font-size: 80px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            text-shadow: 
                0 0 5px #fff,
                0 0 10px #00643cff,
                0 0 20px #00ff99,
                0 0 40px #00ff99;
}

        p {
            color: #ffffffff;
            margin-bottom: 20px;
            margin-top: 20px;
            font-size: 15px;
        }
        .custom-button {
            background-color: #00ff99;
            text-shadow: 
                0 0 5px #fff,
                0 0 10px #00643cff,
                0 0 20px #00ff99,
                0 0 40px #00ff99;
              border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: 0.3s;
        }
        .custom-button:hover {
            background-color: #145c16ff;
        }

        .container {
        display: flex;
        flex-direction: column; 
        align-items: center;    
        justify-content: center;
        min-height: 100vh;      
}                .btn-success {
            background-color:#025e00ff;
            border: none;
            font-weight: bold;
            transition: 0.3s;
        }

    </style>

    </head>
    
    <body>
        <div class="container">        
        <h1>Conheça a Tiana</h1>
        <a href=" {{ route('user.create') }}" class="btn btn-success custom-button mt-3">Cadastrar</a>
        <a href=" {{ route('user.login') }}" class="btn btn-success custom-button mt-3">Entrar</a>
         </div>
    </body>
</html>
