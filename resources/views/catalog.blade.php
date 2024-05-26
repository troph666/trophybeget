<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1><a href="/index">Маркет-плейс</a></h1>
    <div class="search-bar">
        <input type="text" placeholder="Поиск...">
        <button type="submit">Найти</button>
    </div>
    <nav>
        <ul>
            <li><a href="{{ route('catalog') }}">Каталог</a></li>
        </ul>
    </nav>
    <div class="user-actions">
        <a href="/" onclick="showSection('product-catalog');">Каталог</a>
        <a href="/cart" onclick="showSection('login-registration'); showCategories();">Корзина</a>
        <a href="/izbrannoe" onclick="showSection('login-registration'); showCategories();">Избранное</a>
        <a href="#">Заказы</a>
    </div>
    <div class="auth-buttons">
        <a href="#" onclick="showSection('login-registration')">Вход</a>
        <a href="#" onclick="showSection('registration-form')">Регистрация</a>
    </div>
</header>

<main>
    <section id="product-catalog" class="catalog">
        <h2>Каталог товаров</h2>
        <form class="filter-form">
            <label for="category-filter">Категория:</label>
            <select id="category-filter" name="category-filter">
                <option value="all">Все</option>
                <option value="category1">Категория 1</option>
                <option value="category2">Категория 2</option>
                <option value="category3">Категория 3</option>
                <option value="category4">Категория 4</option>
                <option value="category5">Категория 5</option>
            </select>
            <button type="submit">Фильтровать</button>
        </form>
        <div id="product-list" class="product-list">
            <div class="product-item">
                <img src="img/6997180321.webp" alt="" class="product-image">
                <h3 class="product-title">Лакомство PERFECT FIT IMMUNITY <br> для собак, с говядиной и <br> экстрактом бархатцев, 12 шт x 90 г </h3>
                <p class="product-price">Цена: 942 ₽.</p>
                <button>Подробнее</button>
            </div>
            <div class="product-item">
                <img src="img/6921651828.webp" alt="" class="product-image">
                <h3 class="product-title">Philips Парогенератор GC6740/30, <br> фиолетовый</h3>
                <p class="product-price">Цена: 12 242  ₽.</p>
                <button>Подробнее</button>
            </div>
        </div>            
    </section>
</main>

</body>
</html>
