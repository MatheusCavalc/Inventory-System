<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;

class InventoryController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        if ($user->user_level == 'admin') {

            $users = User::count();
            $categories = Category::count();
            $products = Product::count();
            $sales = Sale::count();

            $products_sold = Sale::select('products.name', 'sales.quantity', 'sales.price')
                ->leftJoin('products', 'products.id', '=', 'sales.product_id')
                ->paginate(5)->sortByDesc('quantity');

            $recent_sales = Sale::select('sales.id', 'sales.quantity', 'sales.price', 'sales.updated_at', 'products.name')
                ->leftJoin('products', 'sales.product_id', '=', 'products.id')
                ->paginate(5)->sortByDesc('updated_at');

            $recent_products = Product::select('products.id', 'products.name', 'products.sale_price', 'products.media', 'categories.name AS category')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->paginate(5)->sortByDesc('created_at');
        } else {

            $users = '';
            $categories = '';
            $products = '';
            $sales = '';

            $products_sold = '';
            $recent_sales = '';
            $recent_products = '';
        }

        return view('admin', [
            'user' => $user,
            'users' => $users,
            'products' => $products,
            'categories' => $categories,
            'sales' => $sales,
            'products_sold' => $products_sold,
            'recent_sales' => $recent_sales,
            'recent_products' => $recent_products
        ]);
    }
}
