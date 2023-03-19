@extends('layouts.main')

@section('title', 'Categories')

@section('content')



<div class="container mt-5 text-center">
    <div class="row">
        <div class="col-5">
            <h5>Add new category</h5>

            <form class="row g-3" action="/category" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="category" name="category" placeholder="New category" required>
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Add Category</button>
                </div>
              </form>
        </div>

        <div class="col-7">
            <h5>All categories</h5>
            <table class="table table-sm table-striped table-bordered table-condensed">
                <thead>
                 <tr>
                   <th>#</th>
                   <th>Categories</th>
                   <th>Action</th>
                 <tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary" href="/category/edit/{{ $category->id }}"><i class="fas fa-pen"></i></a>

                            <form action="/category/{{ $category->id }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                <tbody>
               </table>
        </div>

    </div>
</div>



@endsection
