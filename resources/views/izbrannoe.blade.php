<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Избранное</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1><a href="index.html">Маркет-плейс</a></h1>
        <div class="search-bar">
            <input type="text" placeholder="Поиск...">
            <button type="submit">Найти</button>
        </div>
        <nav>
            <ul>
                <li><a href="index.html#product-catalog">Каталог</a></li>
            </ul>
        </nav>
        <div class="user-actions">
            <a href="cart.html">Корзина</a>
            <a href="favorites.html">Избранное</a>
            <a href="#">Заказы</a>
        </div>
        <div class="auth-buttons">
            <a href="#" onclick="showSection('login-registration')">Вход</a>
            <a href="#" onclick="showSection('registration-form')">Регистрация</a>
        </div>
    </header>

    <main>
        <section id="izbrannoe" class="izbrannoe-section">
            <h2>Избранное</h2>
            <div class="izbrannoe-items-list">
                
                <div class="izbrannoe-item">
                    <img src="img/Без названия (1).jpg" alt="" class="izbrannoe-item-image">
                    <div class="izbrannoe-item-details">
                        <h3 class="izbrannoe-item-title">Logitech GPRO</h3>
                        <p class="izbrannoe-item-price">Цена: 10000 ₽.</p>
                        <button class="remove-item-button">Удалить</button>
                        <button class="add-to-cart-button">Добавить в корзину</button>
                        </div>
                    </div>
                    
                    <div class="izbrannoe-item">
                        <img src="img/fdsf.jpg" alt="" class="izbrannoe-item-image">
                        <div class="izbrannoe-item-details">
                            <h3 class="izbrannoe-item-title">hyperx alloy fps pro </h3>
                            <p class="izbrannoe-item-price">Цена: 15000 ₽.</p>
                            <button class="remove-item-button">Удалить</button>
                            <button class="add-to-cart-button">Добавить в корзину</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    
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
    
            function showCategories() {
               
            }
    
            document.addEventListener('DOMContentLoaded', () => {
                const removeButtons = document.querySelectorAll('.remove-item-button');
                removeButtons.forEach(button => {
                    button.addEventListener('click', (event) => {
                        const item = event.target.closest('.izbrannoe-item');
                        item.remove();
                    });
                });
    
                const addToCartButtons = document.querySelectorAll('.add-to-cart-button');
                addToCartButtons.forEach(button => {
                    button.addEventListener('click', (event) => {
                        
                        alert('Товар добавлен в корзину');
                    });
                });
            });
        </script>
    </body>
    </html>
    
