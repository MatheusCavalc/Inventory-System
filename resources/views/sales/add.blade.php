@extends('layouts.main')

@section('title', 'Add Sale')

@section('content')


<div class="row">
    <div class="col-md-6">
          <form action="/sales/add" method="GET" autocomplete="off" id="sug-form">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Find It</button>
              </span>
              <input type="text" id="sug_input" class="form-control" id="product" name="product" placeholder="Search for product name">
           </div>
           <div id="searchSugge" class="list-group"></div>
          </div>
      </form>
    </div>
  </div>
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add sale</span>
         </strong>
        </div>
        <div class="panel-body">
           <table class="table table-bordered">
             <thead>
              <tr><th> Item </th>
              <th> Price </th>
              <th> Qty </th>
              <th> Total </th>
              <th> Date</th>
              <th> Action</th>
             </tr></thead>
               <tbody id="product_info">
                <tr>
                    @if ($products != '')
                        @foreach($products as $product)
                            <form action="/sale/{{ $product->id }}" method="POST">
                            @csrf
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                <input disabled type="text" id="value" value="{{ $product->sale_price }}">
                            </td>
                            <td>
                                <input required type="text" id="quantity" name="quantity">
                            </td>
                            <td>
                                <input type="text" id="price" name="price" value="">
                            </td>
                            <td>
                                {{ $product->updated_at }}
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Add sale</button>
                            </td>
                            </form>
                        @endforeach
                    @else
                    <p>This product doesn't exist</p>
                    @endif
                </tr>
               </tbody>
           </table>
        </div>
      </div>
    </div>

  </div>



<script type="text/javascript">
    $('#sug_input').on('keyup', function () {

        $value = $(this).val();

        $.ajax({
            type: "get",
            url: "/search",
            data: {'search':$value},

            success: function (data) {
                console.log(data);
                $('#searchSugge').html(data);
                $('#searchSugge li').click(function() {

                    $('#sug_input').val($(this).text());
                    $('#searchSugge').fadeOut(500);

                });
            }
        });
    });

    $('#quantity').on('blur', function () {
        $value = $('#value').val()
        $quantity = $('#quantity').val()

        $price = $value * $quantity

        $('#price').val($price);
    });

</script>



@endsection
