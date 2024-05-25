<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
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
            <a href="izbrannoe.html">Избранное</a>
            <a href="#">Заказы</a>
        </div>
        <div class="auth-buttons">
            <a href="#" onclick="showSection('login-registration')">Вход</a>
            <a href="#" onclick="showSection('registration-form')">Регистрация</a>
        </div>
    </header>

    <main>
        <section id="shopping-cart" class="cart-section">
            <h2>Корзина</h2>
            <div class="cart-items">

                <div class="cart-item">
                    <img src="" alt="" class="cart-item-image">
                    <div class="cart-item-details">
                        <h3 class="cart-item-title">JBL</h3>
                        <p class="cart-item-price">Цена: 1000 руб.</p>
                        <label for="quantity1">Количество:</label>
                        <input type="number" id="quantity1" name="quantity1" value="1" min="1">
                        <button class="remove-item-button">Удалить</button>
                    </div>
                </div>
                <div class="cart-item">
                    <img src="" alt="" class="cart-item-image">
                    <div class="cart-item-details">
                        <h3 class="cart-item-title">Hyperx</h3>
                        <p class="cart-item-price">Цена: 5005 руб.</p>
                        <label for="quantity2">Количество:</label>
                        <input type="number" id="quantity2" name="quantity2" value="1" min="1">
                        <button class="remove-item-button">Удалить</button>
                    </div>
                </div>
            </div>
            <div class="cart-summary">
                <p>Итого: <span id="total-price">1500 руб.</span></p>
                <button class="checkout-button">Перейти к оформлению</button>
            </div>
        </section>
    </main>

    <script>
        
        document.addEventListener('DOMContentLoaded', () => {
            
            const removeButtons = document.querySelectorAll('.remove-item-button');
            removeButtons.forEach(button => {
                button.addEventListener('click', event => {
                    const item = event.target.closest('.cart-item');
                    item.remove();
                    updateTotalPrice();
                });
            });

            
            const quantityInputs = document.querySelectorAll('input[type="number"]');
            quantityInputs.forEach(input => {
                input.addEventListener('change', updateTotalPrice);
            });

            function updateTotalPrice() {
                let total = 0;
                const items = document.querySelectorAll('.cart-item');
                items.forEach(item => {
                    const price = parseInt(item.querySelector('.cart-item-price').innerText.replace('Цена: ', '').replace(' руб.', ''));
                    const quantity = parseInt(item.querySelector('input[type="number"]').value);
                    total += price * quantity;
                });
                document.getElementById('total-price').innerText = total + ' руб.';
            }
        });
    </script>
</body>
</html>
