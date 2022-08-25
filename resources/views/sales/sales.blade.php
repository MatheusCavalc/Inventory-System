@extends('layouts.main')

@section('title', 'Sales')

@section('content')

<div class="row">
    <div class="col">
        <a href="/sales/add" style="margin-left: 81%" class="btn btn-primary">New sale</a>
    </div>
</div>

<div class="row">
<div class="col-11">
    <table class="table table-sm table-striped table-bordered table-condensed">
        <thead>
         <tr>
           <th>#</th>
           <th>Product name</th>
           <th>Quantity</th>
           <th>Total</th>
           <th>Date</th>
           <th>Actions</th>
         <tr>
        </thead>
        <tbody>
          @foreach($sales as $sale)
            <tr>
              <td>{{ $sale->id }}</td>
              <td>{{ $sale->name }}</td>
              <td>{{ $sale->quantity }}</td>
              <td>{{ $sale->price }}</td>
              <td>{{ $sale->updated_at }}</td>
              <td>

                <form action="/sale/{{ $sale->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                </form>

            </td>
            </tr>
          @endforeach
        <tbody>
       </table>
</div>
</div>

@endsection
