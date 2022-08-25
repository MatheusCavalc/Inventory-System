<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();

        $user = auth()->user();

        return view('categories.categories', ['user' => $user,
                                   'categories' => $categories
                                  ]);
    }

    public function create(Request $request) {

        $category = new Category;

        $category->name = $request->category;

        $category->save();

        return redirect('/categories')->with('msg', 'Nova categoria adicionada');

    }

    public function edit($id) {

        $user = auth()->user();

        $category = Category::findOrFail($id);

        return view('categories.edit', ['category' => $category, 'user' => $user]);

    }

    public function update(Request $request) {

        $data = $request->all();

        Category::findOrFail($request->id)->update($data);

        return redirect('/categories')->with('msg', 'Categoria editada');

    }

    public function delete($id) {

        Category::findOrFail($id)->delete();

        return redirect('/categories')->with('msg', 'Categoria deletada');

    }
}
