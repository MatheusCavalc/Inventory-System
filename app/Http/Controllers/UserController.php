<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $user = auth()->user();

        $users = User::all();

        return view('users.users', ['user' => $user, 'users' => $users]);

    }

    public function edit($id) {

        $user = auth()->user();

        $users = User::findOrFail($id);

        return view('users.edit', ['user' => $user, 'users' => $users]);

    }

    public function update(Request $request) {

        $data = $request->all();

        User::findOrFail($request->id)->update($data);

        return redirect('/users')->with('msg', 'Usuario atualizado');

    }

    public function delete($id) {

        User::findOrFail($id)->delete();

        return redirect('/users')->with('msg', 'Usuario deletado');

    }
}
