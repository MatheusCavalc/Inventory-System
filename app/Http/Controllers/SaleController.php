<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index() {

        $sales = Sale::select('sales.id', 'sales.quantity', 'sales.price', 'sales.updated_at' ,'products.name')
        ->leftJoin('products', 'sales.product_id', '=', 'products.id')
        ->orderBy('id', 'desc')
        ->paginate(5);

        $user = auth()->user();

        return view('sales.sales', ['user' => $user,
                              'sales' => $sales
                             ]);

    }

    public function add() {

        $user = auth()->user();

        $product = request('product');

        if ($product) {
            $products = Product::where([
                ['name', '=', $product]
            ])->get();
        } else {
            $products = "";
        }

        return view('sales.add', ['user' => $user, 'products' => $products
                               ]);

    }

    public function create($id, Request $request) {

        $sale = new Sale;

        $sale->product_id = $id;
        $sale->quantity = $request->quantity;
        $sale->price = $request->price;

        $sale->save();

        return redirect('/sales')->with('msg', 'Venda adcionada');

    }

    public function search(Request $request) {

        $output = '';

        $products = Product::where('name', 'Like', '%'.$request->search.'%')->paginate(5);

        foreach ($products as $product) {

            $output.=
            '<li class="list-group-item">'.$product->name.'</li>';
        }

        return response($output);

    }

    public function delete($id) {

        Sale::findOrFail($id)->delete();

        return redirect('/sales');

    }
}
