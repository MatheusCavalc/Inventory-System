@extends('layouts.main')

@section('title', 'Edit Product')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <h5>Add new product</h5>
      <div class="panel-body">
       <div class="col-md-12">
        <form action="/product/update/{{ $product->id }}" method="POST" class="clearfix" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Product Title">
             </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="category_id">Categoria do produto:</label>
                  <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                    @if ($product->category_id == $category->id)
                        <option hidden selected value="{{ $product->category_id }}">{{$category->name}}</option>
                    @endif
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                    <label for="title">Imagem da noticia:</label>
                    <input type="file" class="form-control" id="media" name="media">
                </div>
              </div>
            </div>

            <div class="form-group">
             <div class="row">
               <div class="col-md-4">
                 <label for="title">Quantidade do produto (stock):</label>
                 <div class="input-group">
                   <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" placeholder="Product Quantity">
                </div>
               </div>
               <div class="col-md-4">
                 <label for="buy_price">Valor de compra:</label>
                 <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="buy_price" name="buy_price" value="{{ $product->buy_price }}" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                </div>
               </div>
                <div class="col-md-4">
                  <label for="sale_price">Valor de venda:</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="sale_price" name="sale_price" value="{{ $product->sale_price }}" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                 </div>
                </div>
             </div>
            </div>
            <button type="submit" name="add_product" class="btn btn-danger">Edit product</button>
        </form>
       </div>
      </div>
    </div>
  </div>

@endsection
