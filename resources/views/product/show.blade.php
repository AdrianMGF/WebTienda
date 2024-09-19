@extends('templates.master')

@section('content-center')
@foreach ($errors->all() as $sError)
 <div class="alert alert-warning">{{ $sError }}</div>
 @endforeach
<div class="card card-body content-center">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="{{$product->imgUrl}}"
                style="max-width: 100%; max-height: 100%; object-fit: contain;" alt="Product Image">
        </div>
        <div class="col-md-6">
            <h5 class="card-title">{{ $product->Company->name }}</h5>
            <p class="card-text">{{ $product->name }} : {{ $product->description }}</p>
            <p><strong>{{ number_format($product->price * ((100 - $product->discountPercent) / 100), 2) }}</strong>€</p>
            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Añadir al carrito</a>
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">
                    <img src="https://cdn-icons-png.flaticon.com/512/1/1393.png" alt="Añadir al carrito" style="height: 20px; width: 20px; margin-right: 5px;">
                    Editar producto
                </a>
        </div>
    </div>
</div>
@endsection