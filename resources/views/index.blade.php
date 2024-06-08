<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Маркет-плейс</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header>
    <h1>Маркет-плейс</h1>
    <div class="search-bar">
        <input type="text" placeholder="Поиск...">
        <button type="submit">Найти</button>
    </div>
    <div class="user-actions">
        <a href="#" onclick="showSection('product-catalog'); hideAuth();">Каталог</a>
        <a href="#" onclick="showSection('cart'); hideAuth();">Корзина</a>
    </div>
    <div class="auth-buttons">
        @auth
            <a href="#" onclick="showSection('seller-dashboard')">Личный кабинет продавца</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Вход</a>
            <a href="{{ route('register') }}">Регистрация</a>
        @endauth
    </div>
</header>
<main>
    @auth
        @if(Auth::user()->role == 'seller')
            <section id="seller-dashboard" class="dashboard">
                <h2>Личный кабинет продавца</h2>
                <nav>
                    <ul>
                        <li><a href="#" onclick="showSection('product-catalog'); hideAuth();">Главная</a></li>
                        <li><a href="#" onclick="showSellerSection('seller-products')">Мои товары</a></li>
                        <li><a href="#" onclick="showSellerSection('seller-orders')">Заказы</a></li>
                    </ul>
                </nav>
                <div id="seller-products" class="seller-section">
                    <h3>Мои товары</h3>
                    <form action="{{ route('product.add') }}" method="POST" class="add-product-form" style="border: 1px solid #ccc; border-radius: 5px; padding: 20px; margin-bottom: 20px; background-color: #f9f9f9;">
                        @csrf
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="product-name" style="display: block; margin-bottom: 5px;">Название товара:</label>
                            <input type="text" id="product-name" name="product-name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="product-description" style="display: block; margin-bottom: 5px;">Описание товара:</label>
                            <textarea id="product-description" name="product-description" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="product-price" style="display: block; margin-bottom: 5px;">Цена:</label>
                            <input type="number" id="product-price" name="product-price" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="product-category" style="display: block; margin-bottom: 5px;">Категория:</label>
                            <select id="product-category" name="product-category" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                <option value="category1">Категория 1</option>
                                <option value="category2">Категория 2</option>
                                <option value="category3">Категория 3</option>
                                <option value="category4">Категория 4</option>
                                <option value="category5">Категория 5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-submit" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;">Добавить товар</button>
                    </form>
                    <div id="seller-product-list" class="product-list"></div>
                </div>
                <div id="seller-orders" class="seller-section hidden">
                    <h3>Заказы</h3>
                    <div id="seller-order-list" class="order-list"></div>
                </div>
            </section>
        @elseif(Auth::user()->isAdmin())
        <section id="admin-dashboard" class="dashboard" style="margin: 20px;">
    <div class="container" style="max-width: 1200px; margin: auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h1 style="color: #333;">Личный кабинет админа</h1>
        <div id="users" class="section" style=" margin-top: 20px;">
            <h2 style="color: #333;">Пользователи</h2>
            <button class="btn" onclick="confirmUser()" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s; margin-right: 10px;">Подтвердить товар</button>
            <button class="btn" onclick="blockUser()" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">Блокировка пользователя</button>
        </div>
    </div>
</section>
        @else
            <section id="buyer-dashboard" class="dashboard" style="margin: 20px;">
                <div class="container" style="max-width: 1200px; margin: auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <h1 style="color: #333;">Личный кабинет покупателя</h1>
                    <nav>
                        <ul style="list-style: none; padding: 0; display: flex; gap: 10px;">
                            <li style="margin: 0;"><a href="#" onclick="showSection('orders')" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: #fff; border-radius: 5px; transition: background-color 0.3s;">Мои заказы</a></li>
                            <li style="margin: 0;"><a href="#" onclick="showSection('settings')" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: #fff; border-radius: 5px; transition: background-color 0.3s;">Настройки</a></li>
                        </ul>
                    </nav>
                    <div id="orders" class="section active" style="display: block; margin-top: 20px;">
                        <h2 style="color: #333;">Мои заказы</h2>
                    </div>
                    <div id="settings" class="section" style="display: none; margin-top: 20px;">
                        <h2 style="color: #333;">Настройки</h2>
                        <form method="POST" action="#">
                            @csrf
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="name" style="display: block; margin-bottom: 5px; color: #555;">Имя:</label>
                                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </div>
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="email" style="display: block; margin-bottom: 5px; color: #555;">Email:</label>
                                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </div>
                            <button type="submit" class="btn" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">Сохранить изменения</button>
                        </form>
                    </div>
                </div>
            </section>
        @endif
    @endauth
    
    <section id="product-catalog" class="catalog">
    <h2>Каталог товаров</h2>
    <form class="filter-form" onsubmit="filterProducts(event)">
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
    <style>
    .product-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
    }

    .product-card {
        background-color: #ffffff;
        border: 1px solid #dddddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: calc(33% - 20px);
    }

    .product-card img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .product-title {
        font-size: 18px;
        margin: 10px 0;
    }

    .product-description {
        font-size: 16px;
        color: #555555;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 16px;
        color: #d9534f;
        margin: 10px 0;
    }

    .product-category {
        font-size: 16px;
        color: #007bff;
        margin: 10px 0;
    }

    .product-seller {
        font-size: 16px;
        color: #555555;
        margin: 10px 0;
    }

    .add-to-cart-button,
    .details-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    .add-to-cart-button:hover,
    .details-button:hover {
        background-color: #0056b3;
    }

    .cart {
        display: none;
    }

    .cart-items {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .clear-cart-button,
    .checkout-button {
        padding: 10px 20px;
        background-color: #d9534f;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    .clear-cart-button:hover,
    .checkout-button:hover {
        background-color: #c9302c;
    }
</style>

<div id="product-list" class="product-list">
    @foreach($products as $product)
    <div class="product-card" data-category="{{ $product->category }}">
        <h3 class="product-title">{{ $product->name }}</h3>
        <p class="product-description">{{ $product->description }}</p>
        <p class="product-price">Цена: {{ $product->price }}</p>
        <p class="product-category">Категория: {{ $product->category }}</p>
        <p class="product-seller">Продавец: {{ $product->seller_name }}</p>
        <button class="add-to-cart-button" onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})">Добавить в корзину</button>
        <button class="checkout-button" onclick="checkout()">Оформить заказ</button>
    </div>
    @endforeach
</div>

<section id="cart" class="cart hidden">
        <h2>Корзина</h2>
        <div id="cart-items" class="cart-items"></div>
        <button onclick="clearCart()">Очистить корзину</button>
        <button onclick="checkout()">Оформить заказ</button>
    </section>



<script>

function showSection(sectionId) {
        const sections = document.querySelectorAll('main > section');
        sections.forEach(section => {
            if (section.id === sectionId) {
                section.classList.remove('hidden');
            } else {
                section.classList.add('hidden');
            }
        });
    }
    
    function addToCart(productId, productName, productPrice) {
        const cartItems = document.getElementById('cart-items');
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.dataset.id = productId;
        cartItem.innerHTML = `
            <h3>${productName}</h3>
            <p>Цена: ${productPrice} ₽</p>
            <button class="remove-item-button" onclick="removeFromCart(${productId})">Удалить</button>
        `;
        cartItems.appendChild(cartItem);
    }


    function checkout() {
        alert('Оформление заказа');
    }

function hideAuth() {
        const authSections = document.querySelectorAll('.auth-section');
        authSections.forEach(section => {
            section.classList.add('hidden');
        });
    }


    function showSellerSection(sectionId) {
        const sellerSections = document.querySelectorAll('.seller-section');
        sellerSections.forEach(section => {
            if (section.id === sectionId) {
                section.classList.remove('hidden');
            } else {
                section.classList.add('hidden');
            }
        });
    }


    function confirmUser() {
            window.location.href = "http://127.0.0.1:8000/admin/products";
        }

        function blockUser(userId) {
    fetch(`/user/block/${userId}`, { method: 'POST' })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Ошибка блокировки пользователя');
            }
        })
        .then(data => {
            alert('Пользователь успешно заблокирован');
        })
        .catch(error => console.error('Ошибка блокировки пользователя:', error));
}



    function register(event) {
    event.preventDefault();
    const role = document.getElementById('role').value;
    if (role === 'seller') {
        showSection('seller-dashboard');
    } else {
        showSection('buyer-dashboard');
    }
}


function showSection(sectionId) {
    const sections = document.querySelectorAll('main > section');
    sections.forEach(section => {
        if (section.id === sectionId) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
        }
    });
}

    function login(event) {
        event.preventDefault();
        showSection('buyer-dashboard');
    }

    function filterProducts(event) {
    event.preventDefault();
    const categoryFilter = document.getElementById('category-filter').value;
    const productItems = document.querySelectorAll('.product-card');

    productItems.forEach(item => {
        const category = item.querySelector('.product-category').textContent.split(': ')[1]; 
        if (categoryFilter === 'all' || category === categoryFilter) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

</script>
</body>
</html>