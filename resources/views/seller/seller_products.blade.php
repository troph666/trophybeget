<div id="seller-products" class="seller-section" style="margin-top: 30px; max-width: 800px; margin-left: auto; margin-right: auto;">
    <h3>Добавить товар</h3>
    <div class="redirect-btn">
            <a href="{{ route('catalog') }}">Каталог товаров</a>
        </div>
    <form action="{{ route('product.add') }}" method="POST" class="add-product-form" style="border: 1px solid #ccc; border-radius: 5px; padding: 20px; margin-bottom: 20px; background-color: #f9f9f9;" enctype="multipart/form-data">
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

        <div class="form-group">
            <label for="product-image">Изображение товара:</label>
            <input type="file" id="product-image" name="product-image">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="product-category" style="display: block; margin-bottom: 5px;">Категория:</label>
            <select id="product-category" name="product-category" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <option value="category1">Электроника</option>
            <option value="category2">Обувь</option>
            <option value="category3">Мебель</option>
            <option value="category4">Аксессуары</option>
            <option value="category5">Автотовары</option>
            </select>
        </div>
        <button type="submit" class="btn-submit" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;">Добавить товар</button>
    </form>

    <h3>Мои товары</h3>
    <div class="product-container" style="display: flex; flex-wrap: wrap;">
        @foreach($products as $product)
            <div class="product-item" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px; margin-right: 10px; margin-bottom: 20px; width: calc(33.33% - 10px); flex-grow: 1;">
                <p style="margin: 5px 0;"><strong>Название:</strong> {{ $product->name }}</p>
                <p style="margin: 5px 0;"><strong>Описание:</strong> {{ $product->description }}</p>
                <p style="margin: 5px 0;"><strong>Цена:</strong> {{ $product->price }}</p>
                <p style="margin: 5px 0;"><strong>Статус:</strong> {{ $product->status }}</p>
                @if($product->status === 'rejected' && $product->rejection_reason)
                    <p class="rejection-reason" style="color: red;"><strong>Причина отклонения:</strong> {{ $product->rejection_reason }}</p>
                @endif
                <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background-color: #dc3545; color: #fff; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer; margin-top: 10px;">Удалить товар</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
