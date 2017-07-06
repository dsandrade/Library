<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Labs Library | @yield('page-title')</title>
    {{ Html::style('css/bootstrap.css') }}
</head>
<body>
<div class="container">
    <h1>Bem vindo ao crud de @yield('page-title')</h1>

    @yield('content')

</div>
</body>
</html>