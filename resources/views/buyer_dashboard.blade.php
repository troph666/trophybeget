<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет покупателя</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            box-sizing: border-box;
        }

        h1 {
            margin-bottom: 2rem;
            text-align: center;
            color: #333;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            padding: 0;
        }

        nav ul li {
            margin-right: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #007bff;
            font-size: 1.2rem;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .order-list, .settings {
            margin-top: 20px;
        }

        .order-item {
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .settings label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        .settings input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Личный кабинет покупателя</h1>
        <nav>
            <ul>
                <li><a href="#" onclick="showSection('orders')">Мои заказы</a></li>
                <li><a href="#" onclick="showSection('settings')">Настройки</a></li>
            </ul>
        </nav>
        <div id="orders" class="section active">
            <h2>Мои заказы</h2>
            <div class="order-list">
                
                <div class="order-item">
                    <p>Заказ #12345</p>
                    <p>Дата: 01/01/2024</p>
                    <p>Статус: Доставлено</p>
                </div>
                
            </div>
        </div>
        <div id="settings" class="section">
            <h2>Настройки</h2>
            <form method="POST" action="#">
                @csrf
                <div class="form-group">
                    <label for="name">Имя:</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                </div>
                <button type="submit" class="btn">Сохранить изменения</button>
            </form>
        </div>
    </div>
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        }
    </script>
</body>
</html>
