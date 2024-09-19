@extends('templates.master')

@section('content-center')
<div class="card-body">
    <form  action="{{ route('product.update', ['product' => $product]) }}"  method = "post">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="name">auth.Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">auth.Description:</label>
            <textarea id="description" name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('auth.Save') }}</button>
    </form>
</div>
@endsection