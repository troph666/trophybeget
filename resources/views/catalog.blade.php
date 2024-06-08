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
    <div id="product-list" class="product-list">
        @foreach($products as $product)
            <div class="product-item" data-category="{{ $product->category }}">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-seller">Продавец: {{ $product->seller_name }}</p>
                <p class="product-category">Категория: {{ $product->category }}</p>
                <p class="product-price">Цена: {{ $product->price }} ₽</p>
                <button class="add-to-cart-button" onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})">Добавить в корзину</button>
                <button class="order-button" onclick="orderProduct({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})">Оформить заказ</button>
                <button class="details-button" onclick="showProductDetails({{ $product->id }})">Подробнее</button>
            </div>
        @endforeach
    </div>
</section>


