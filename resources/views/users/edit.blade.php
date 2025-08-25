<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Usuário</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background-image: url('https://wallpaper.forfun.com/fetch/34/343e8efa96951c134cd49c5b124a17fa.jpeg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding: 50px 20px;
    color: #fff;
}

/* Overlay escuro */
body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: -1;
}

/* Título */
h2 {
    font-size: 2.5rem;
    font-weight: bold;
    text-transform: uppercase;
    text-shadow: 0 0 5px #fff, 0 0 15px #00ff99, 0 0 30px #00ff99;
    margin-bottom: 30px;
}

/* Container do formulário */
form {
    background-color: rgba(0,0,0,0.6);
    padding: 30px;
    border-radius: 15px;
    max-width: 500px;
    width: 100%;
    box-shadow: 0 0 20px #00ff99;
}

/* Labels */
label {
    font-weight: bold;
    text-transform: uppercase;
    text-shadow: 0 0 5px #fff, 0 0 15px #00ff99;
}

/* Inputs */
input.form-control {
    margin-bottom: 15px;
    border-radius: 8px;
}

/* Botões */
button, a.btn {
    border-radius: 10px;
    font-weight: bold;
    padding: 10px 25px;
    transition: all 0.3s;
    box-shadow: 0 0 10px #00ff99;
    cursor: pointer;
}

button.btn-warning:hover {
    background-color: #145c16ff;
    color: #fff;
    box-shadow: 0 0 20px #00ff99;
}

a.btn-secondary:hover {
    background-color: #333;
    color: #fff;
    box-shadow: 0 0 15px #00ff99;
}

/* Alertas */
.alert {
    max-width: 500px;
    margin: 10px auto;
}
</style>
</head>
<body>
<h2>Editar Usuário</h2>

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

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}">
    </div>
    <div class="mb-3">
        <label>E-mail:</label>
        <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}">
    </div>
    <div class="mb-3">
        <label>Nova Senha (opcional):</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-warning">Atualizar</button>
    <a href="{{ route('user.create') }}" class="btn btn-secondary">Voltar</a>
</form>
</body>
</html>
