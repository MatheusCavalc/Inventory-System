@extends('layouts.main')

@section('title', 'Edit User')

@section('content')


<div class="col-md-10">
    <div class="row">
        <div class="col-5">
            <h5>Edit user permissions</h5>

            <form class="row g-3" action="/user/update/{{ $users->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="user_level">Edit permission level</label>
                    <select name="user_level" id="user_level">
                        <option selected hidden value="{{ $users->user_level }}">{{ @ucfirst($users->user_level) }}</option>
                        <option value="admin">Admin</option>
                        <option value="special">Special</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Edit status</label>
                    <select name="status" id="status">
                        <option selected hidden value="{{ $users->status }}">{{ @ucfirst($users->status) }}</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Change Permissions</button>
                </div>
              </form>
        </div>



@endsection
