@extends('templates.master')

@section('content-center')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Agrega enlaces a Bootstrap si lo estás utilizando -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Carrito de Compras</h2>

        @if($cart->iTotalItems > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->htItem as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td><img src="{{ $item['imgUrl'] }}" alt="{{ $item['name'] }}" style="width: 50px;"></td>
                    <td>${{ $item['price'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ $item['quantity'] * $item['price'] }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('cart.operate',[ 'operation' => 'add', 'product' => $item['id'] ]) }}" class="btn btn-success">
                                +
                            </a>

                            <a href="{{ route('cart.operate',[ 'operation' => 'remove', 'product' => $item['id'] ]) }}" class="btn btn-danger">
                                -
                            </a>

                            <a href="{{ route('cart.operate',[ 'operation' => 'removeAll', 'product' => $item['id'] ]) }}" class="btn btn-warning">
                                Eliminar Todos
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p>Total de artículos: {{ $cart->iTotalItems }}</p>
        <p>Total a Pagar: ${{ $cart->dTotalPrice }}</p>
        @else
        <p>El carrito está vacío.</p>
        @endif
    </div>

    @endsection