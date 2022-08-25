@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

@if ($users != '')

<div class="container mt-5 text-center">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $users }}</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Users</h3>
                    <a href="/users">All users</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $categories }}</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Categories</h3>
                    <a href="/categories">All categories</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $products }}</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Products</h3>
                    <a href="/products">All products</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $sales }}</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Sales</h3>
                    <a href="/sales">All sales</a>
                </div>
              </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h5>Highest Selling</h5>
            <table class="table table-sm table-striped table-bordered table-condensed">
                <thead>
                 <tr>
                   <th>Product</th>
                   <th>Total Sale ($)</th>
                   <th>Total Quantity</th>
                 <tr>
                </thead>
                <tbody>
                  @foreach($products_sold as $product_sold)
                    <tr>
                      <td>{{ $product_sold->name }}</td>
                      <td>{{ $product_sold->price }}</td>
                      <td>{{ $product_sold->quantity }}</td>
                    </tr>
                  @endforeach
                <tbody>
               </table>
        </div>


        <div class="col">
            <h5>Latest Sales</h5>
            <table class="table table-sm table-striped table-bordered table-condensed">
                <thead>
                 <tr>
                   <th>#</th>
                   <th>Product Name</th>
                   <th>Date</th>
                   <th>Total Sale</th>
                 <tr>
                </thead>
                <tbody>
                  @foreach($recent_sales as $recent_sale)
                    <tr>
                      <td>-</td>
                      <td>{{ $recent_sale->name }}</td>
                      <td>{{ $recent_sale->updated_at }}</td>
                      <td>{{ $recent_sale->price }}</td>
                    </tr>
                  @endforeach
                <tbody>
               </table>
        </div>


        <div class="col">
                  <h5>Recently Added Products</h5>

                  @foreach($recent_products as $recent_product)
                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $recent_product->name }}
                          <span class="badge badge-secondary badge-pill">{{ $recent_product->sale_price }}</span>
                        </li>
                      </ul>
                  @endforeach

        </div>
    </div>
</div>

@else

<h3>Dashboard</h3>

@endif



@endsection
