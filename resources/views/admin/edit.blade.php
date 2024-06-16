<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать товар</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-top: 10px;
        }

        form input, form textarea, form select {
            padding: 5px;
            margin-top: 5px;
        }

        form button {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Редактировать товар</h1>
        <form method="post" action="{{ route('admin.product.update', $product->id) }}">
            @csrf
            @method('PATCH')
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>

            <label for="description">Описание:</label>
            <textarea id="description" name="description" required>{{ $product->description }}</textarea>

            <label for="price">Цена:</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" required>

            <label for="category">Категория:</label>
            <select id="category" name="category" required>
                <option value="category1" {{ $product->category === 'category1' ? 'selected' : '' }}>Электроника</option>
                <option value="category2" {{ $product->category === 'category2' ? 'selected' : '' }}>Обувь</option>
                <option value="category3" {{ $product->category === 'category3' ? 'selected' : '' }}>Мебель</option>
                <option value="category4" {{ $product->category === 'category4' ? 'selected' : '' }}>Аксессуары</option>
                <option value="category5" {{ $product->category === 'category5' ? 'selected' : '' }}>Автотовары</option>
            </select>

            <button type="submit">Сохранить изменения</button>
        </form>
    </div>
</body>
</html>
