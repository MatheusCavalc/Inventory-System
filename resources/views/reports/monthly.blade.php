@extends('layouts.main')

@section('title', 'Monthly Sales')

@section('content')


<div class="row">
    <div class="col-11">
        <table class="table table-sm table-striped table-bordered table-condensed">
            <thead>
             <tr>
               <th>Date</th>
               <th>Product name</th>
               <th>Buying price</th>
               <th>Selling Price</th>
               <th>Total Qty</th>
               <th>Total</th>
             <tr>
            </thead>
            <tbody>
              @foreach($daily as $daily)
             <tr>
                  <td>{{ $daily->id }}</td>
                  <td>{{ $daily->name }}</td>
                  <td>{{ $daily->buy_price}}</td>
                  <td>{{ $daily->sale_price}}</td>
                  <td>{{ $daily->quantity }}</td>
                  <td class="price" value="{{ $daily->price }}">{{ $daily->price }}</td>
             </tr>
              @endforeach
            <tbody>
           </table>
    </div>
    </div>

    <span>

        <p>Total: {{ $total }}</p>


    </span>


    <script type="text/javascript">

    </script>


@endsection
