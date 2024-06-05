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
            <a href="/cart">Корзина</a>
            <a href="#">Заказы</a>
        </div>
        <div class="auth-buttons">
            <a href="#" onclick="showSection('login-registration')">Вход</a>
            <a href="#" onclick="showSection('registration-form')">Регистрация</a>
        </div>
    </header>

    <div class="cart-items">
        @foreach ($cartItems as $item)
            <div class="cart-item" data-product-id="{{ $item->product->id }}">
                <h2>{{ $item->product->name }}</h2>
                <p class="cart-item-price">Цена: {{ $item->product->price }} руб.</p>
                <input type="number" value="{{ $item->quantity }}" min="1">
                <button class="remove-item-button">Удалить</button>
            </div>
        @endforeach
    </div>

    <div id="total-price">Общая сумма: {{ $totalPrice }} руб.</div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const removeButtons = document.querySelectorAll('.remove-item-button');
            removeButtons.forEach(button => {
                button.addEventListener('click', event => {
                    const item = event.target.closest('.cart-item');
                    const productId = item.dataset.productId; 
                    fetch(`/cart/remove/${productId}`, { method: 'DELETE' })
                        .then(response => {
                            if (response.ok) {
                                item.remove();
                                updateTotalPrice();
                            }
                        })
                        .catch(error => console.error('Error removing item:', error));
                });
            });

            const quantityInputs = document.querySelectorAll('input[type="number"]');
            quantityInputs.forEach(input => {
                input.addEventListener('change', event => {
                    const item = event.target.closest('.cart-item');
                    const productId = item.dataset.productId;
                    const quantity = event.target.value;
                    fetch(`/cart/update/${productId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ quantity })
                    })
                        .then(response => {
                            if (response.ok) {
                                updateTotalPrice();
                            }
                        })
                        .catch(error => console.error('Error updating quantity:', error));
                });
            });

            function updateTotalPrice() {
                let total = 0;
                const items = document.querySelectorAll('.cart-item');
                items.forEach(item => {
                    const price = parseInt(item.querySelector('.cart-item-price').innerText.replace('Цена: ', '').replace(' руб.', ''));
                    const quantity = parseInt(item.querySelector('input[type="number"]').value);
                    total += price * quantity;
                });
                document.getElementById('total-price').innerText = 'Общая сумма: ' + total + ' руб.';
            }
        });
    </script>
</body>
</html>
