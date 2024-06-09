<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product List</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .product h2 {
            margin-top: 0;
        }

        .product button {
            padding: 5px 10px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product button:hover {
            background-color: #45a049;
        }

        .product .reject-button {
            background-color: #f44336;
        }

        .product .reject-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Список товаров для подтверждения</h1>
        @foreach($products as $product)
    <div class="product" id="product_{{ $product->id }}">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Цена: {{ $product->price }}</p>
                <p>Категория: {{ $product->category }}</p>
                <form method="post" action="{{ route('admin.product.approve', $product->id) }}">
                    @csrf
                    <button type="submit">Подтвердить товар</button>
                </form>
                <form method="post" action="{{ route('admin.product.reject', $product->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="rejection_reason">Причина отклонения:</label>
                        <textarea id="rejection_reason" name="rejection_reason" required></textarea>
                    </div>
                    <button type="submit" class="reject-button">Отклонить товар</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
