<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="admin-header" style="background-color: #007bff; color: white; padding: 10px;">
        <div class="container">
            <h1>Админ панель</h1>
            <a href="{{ route('logout') }}" style="color: white;">Выйти</a>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;">
        @yield('content')
    </div>
</body>
</html>
