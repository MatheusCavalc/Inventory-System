@extends('layouts.main')

@section('title', 'Edit Category')

@section('content')

<div class="container mt-5 text-center">
    <div class="row">
        <div class="col-5">
            <h5>Edit category</h5>

            <form class="row g-3" action="/category/update/{{ $category->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Titulo da Noticia">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Change Category</button>
                </div>
              </form>
        </div>


@endsection
