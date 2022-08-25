<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    public function index() {

        $products = Product::select('products.id','products.name','products.quantity','products.buy_price','products.sale_price','products.media','products.created_at','products.updated_at','categories.name AS category')
                             ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                             ->orderBy('id', 'desc')
                             ->paginate(5);

        $user = auth()->user();

        return view('products.products', ['user' => $user,
                                 'products' => $products
                                ]);
    }

    public function add() {

        $user = auth()->user();
        $categories = Category::all();

        return view('products.add', ['user' => $user,
                                   'categories' => $categories
                                  ]);
    }

    public function create(Request $request) {

        $product = new Product;

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->buy_price = $request->buy_price;
        $product->sale_price = $request->sale_price;


        if($request->hasFile('media') ** $request->file('media')->isValid()) {

            $requestImage = $request->media;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->media->move(public_path('img/product'), $imageName);

            $product->media = $imageName;
        }

        $product->save();

        return redirect('/products')->with('msg', 'Produto adcionado');
    }

    public function edit($id) {

        $user = auth()->user();

        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', ['product' => $product,
                                    'user' => $user,
                                    'categories' => $categories
                                   ]);

    }

    public function update(Request $request) {

        $data = $request->all();

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestImage = $request->media;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->media->move(public_path('img/product'), $imageName);

            $data['media'] = $imageName;
        }

        Product::findOrFail($request->id)->update($data);

        return redirect('/products')->with('msg', 'Produto editado');

    }

    public function delete($id) {

        Product::findOrFail($id)->delete();

        return redirect('/products')->with('msg', 'Produto deletado');

    }
}
