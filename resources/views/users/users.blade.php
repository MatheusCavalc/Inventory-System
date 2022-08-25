@extends('layouts.main')

@section('title', 'Users')

@section('content')

<div class="panel-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center" style="width: 50px;">#</th>
          <th>Name</th>
          <th>Email</th>
          <th class="text-center" style="width: 15%;">User Role</th>
          <th class="text-center" style="width: 10%;">Status</th>
          <th style="width: 20%;">Last Login</th>
          <th class="text-center" style="width: 100px;">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($users as $users)
        <tr>
            <td>{{ $users->id }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->user_level }}</td>
            <td>{{ $users->status }}</td>
            <td>{{ $users->updated_at }}</td>
            <td>

                @if ($user->id == $users->id)
                    <a class="btn btn-primary" href="/user/profile"><i class="fas fa-pen"></i></a>
                @else
                    <a class="btn btn-primary" href="/user/edit/{{ $users->id }}"><i class="fas fa-pen"></i></a>
                @endif

                <form action="/user/{{ $users->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                </form>

            </td>
           </tr>
        @endforeach

      </tbody>
   </table>
   </div>

@endsection
