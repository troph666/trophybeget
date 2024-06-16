<section id="product-catalog" class="catalog">
    <h2>Каталог товаров</h2>
    <form class="filter-form" onsubmit="filterProducts(event)">
        <label for="category-filter">Категория:</label>
        <select id="category-filter" name="category-filter">
            <option value="all">Все</option>
            <option value="category1">Электроника</option>
            <option value="category2">Обувь</option>
            <option value="category3">Мебель</option>
            <option value="category4">Аксессуары</option>
            <option value="category5">Автотовары</option>
        </select>
        <button type="submit">Фильтровать</button>
    </form>
    <div id="product-list" class="product-list">
    @foreach($products as $product)
<div class="product-card">
    <h3 class="product-title">{{ $product->name }}</h3>
    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
    <p class="product-description">{{ $product->description }}</p>
    <p class="product-price">Цена: {{ $product->price }}</p>
    <p class="product-category">Категория: {{ $product->category }}</p>
    <p class="product-seller">Продавец: {{ $product->seller_name }}</p>
    <form action="{{ route('order.create') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="product_name" value="{{ $product->name }}">
        <input type="hidden" name="product_price" value="{{ $product->price }}">
        <button type="submit">Оформить заказ</button>
    </form>
</div>
@endforeach


