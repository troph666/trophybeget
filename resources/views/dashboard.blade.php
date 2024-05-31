<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет продавца</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Личный кабинет продавца</h1>
        <nav>
            <ul>
                <li><a href="#" onclick="showSection('seller-products')">Мои товары</a></li>
                <li><a href="#" onclick="showSection('seller-orders')">Заказы</a></li>
            </ul>
        </nav>
        <div id="seller-products" class="section">
            <h3>Мои товары</h3>
            <form class="product-form" onsubmit="addProduct(event)">
                <label for="product-name">Название товара:</label>
                <input type="text" id="product-name" name="product-name" required>
                <label for="product-description">Краткое описание:</label>
                <textarea id="product-description" name="product-description" required></textarea>
                <label for="product-price">Цена:</label>
                <input type="number" id="product-price" name="product-price" required>
                <label for="product-image">Фото:</label>
                <input type="file" id="product-image" name="product-image" accept="image/*">
                <label for="product-category">Категория:</label>
                <select id="product-category" name="product-category">
                    <option value="category1">Категория 1</option>
                    <option value="category2">Категория 2</option>
                    <option value="category3">Категория 3</option>
                    <option value="category4">Категория 4</option>
                    <option value="category5">Категория 5</option>
                </select>
                <button type="submit">Добавить товар</button>
            </form>
            <div id="seller-product-list" class="product-list"></div>
        </div>
        <div id="seller-orders" class="section hidden">
            <h3>Заказы</h3>
            <div id="seller-order-list" class="order-list"></div>
        </div>
    </div>
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>
    <style>
        .hidden { display: none; }
    </style>
</body>
</html>
