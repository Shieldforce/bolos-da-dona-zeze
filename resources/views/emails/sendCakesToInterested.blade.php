<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Bolos</title>
</head>
<body>

<div class="container">
    <h1>Lista de Bolos</h1>
    <ul>
        @foreach($cakes as $cake)
            <li>{{ $cake->name  }}</li>
        @endforeach
    </ul>
</div>

</body>
</html>