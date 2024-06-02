@extends('layouts.admin')

@section('content')
    <h2>Товары на рассмотрении</h2>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form action="{{ route('admin.product.changeStatus', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit">Одобрить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
