@extends('layouts.app')

@section('content')
    <h2>Каталог товаров</h2>
    <ul>
        @foreach ($approvedProducts as $product)
            <li>{{ $product->name }} - {{ $product->price }}</li>
        @endforeach
    </ul>
@endsection
