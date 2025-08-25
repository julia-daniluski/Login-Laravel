<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastrar Usuário</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        h2 {
            font-size: 40px;
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
        
        label{
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            text-shadow: 
                0 0 5px #fff,
                0 0 30px #00643cff,
                0 0 20px #00ff99,
                0 0 40px #00ff99;
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
    <body class="container py-5">
    <h2>Cadastrar Usuário</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $erro)
    <li>{{ $erro }}</li>
    @endforeach
    </ul>
    </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Digite seu nome" required>
    </div>
    <div class="mb-3">
    <label>E-mail:</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Digite seu email" required>
    </div>
    <div class="mb-3">
    <label>Senha:</label>
            <input type="password" name="password" class="form-control" placeholder="Digite sua senha" required>
        </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('user.login') }}" class="btn btn-success">Login</a>
    </form>
    </body>
    </html>
