@extends('layouts.app')

@section('content')
<div class="redirect-btn">
            <a href="{{ route('catalog') }}">Каталог товаров</a>
        </div>
<div class="container">
    <h1 class="my-4">Мои заказы</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="order-list">
                @foreach($orders as $order)
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($order->product) 
                        <h5 class="card-title text-primary mb-3">Товар: {{ $order->product->name }}</h5>
                        <p class="card-text"><strong>Цена:</strong> {{ $order->product->price }} ₽</p>
                        <p class="card-text"><strong>Категория:</strong> {{ $order->product->category }}</p>
                        <p class="card-text"><strong>Продавец:</strong> {{ $order->product->seller_name }}</p>
                        @else
                        <p class="card-text">Продукт для этого заказа отсутствует</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        background-color: #f8f9fa;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.2rem;
    }

    .card-text {
        font-size: 1rem;
        color: #6c757d;
    }
</style>

@endsection
