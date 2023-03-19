@extends('layouts.main')

@section('title', 'Products')

@section('content')

<div class="mt-2">
    <div class="row">
        <div class="col">
            <a href="/products/add" style="margin-left: 81%" class="btn btn-primary">New product</a>
        </div>
    </div>
</div>

<div class="mt-2">
    <div class="row">
        <div class="col-11">
            <table class="table table-sm table-striped table-bordered table-condensed">
                <thead>
                <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Product name</th>
                <th>Category</th>
                <th>In stock</th>
                <th>Buying price</th>
                <th>Selling Price</th>
                <th>Product Add</th>
                <th>Actions</th>
                <tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img class="img-avatar img-circle" src="/img/product/{{ $product->media }}" alt=""></td>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->category}}</td>
                        <td>{{ $product->quantity}}</td>
                        <td>{{ $product->buy_price}}</td>
                        <td>{{ $product->sale_price}}</td>
                        <td>{{ $product->created_at}}</td>

                        <td>
                            <div class="d-flex flex-row mb-3">
                                <a class="btn btn-primary" href="/product/edit/{{ $product->id }}"><i class="fas fa-pen"></i></a>

                                <form action="/product/{{ $product->id }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                {{ $products->links() }}
                <tbody>
            </table>
        </div>
    </div>
</div>

@endsection
