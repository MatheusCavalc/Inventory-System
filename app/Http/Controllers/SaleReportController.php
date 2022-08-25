<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    public function index() {

        $user = auth()->user();

        return view('reports.sale', ['user' => $user]);

    }

    public function read(Request $request) {

        $user = auth()->user();

        $start_date = date("Y-m-d", strtotime($request->start_date));
        $end_date = date("Y-m-d", strtotime($request->end_date));

        $daily = Sale::select('sales.id', 'sales.updated_at', 'products.name', 'products.sale_price', 'products.buy_price', 'sales.quantity', 'sales.price')
                        ->leftJoin('products', 'sales.product_id', '=', 'products.id')
                        ->where('sales.updated_at', '>=', $start_date. ' 00:00:00')
                        ->where('sales.updated_at', '<=', $end_date. ' 23:59:59')
                        ->get();

        $total = DB::table('sales')->where('sales.updated_at', '>=', $start_date. ' 00:00:00')
                                    ->where('sales.updated_at', '<=', $end_date. ' 23:59:59')
                                    ->sum('price');

        //echo date('Y-m'). '-01 00:00:00';

        return view('reports.date', ['user' => $user,
                                  'daily' => $daily,
                                  'total' => $total
                                 ]);

    }

    public function monthly() {

        $user = auth()->user();

        $daily = Sale::select('sales.id', 'sales.updated_at', 'products.name', 'products.sale_price', 'products.buy_price', 'sales.quantity', 'sales.price')
        ->leftJoin('products', 'sales.product_id', '=', 'products.id')
        ->where('sales.updated_at', '>=', date('Y-m'). '-01 00:00:00')
        ->where('sales.updated_at', '<=', date('Y-m'). '-31 23:59:59')
        ->get();

        $total = DB::table('sales')->where('sales.updated_at', '>=', date('Y-m'). '-01 00:00:00')
                                    ->where('sales.updated_at', '<=', date('Y-m'). '-31 23:59:59')
                                    ->sum('price');

        return view('reports.monthly', ['user' => $user,
                                     'daily' => $daily,
                                     'total' => $total
       ]);

    }

    public function daily() {

        $user = auth()->user();

        $daily = Sale::select('sales.id', 'sales.updated_at', 'products.name', 'products.sale_price', 'products.buy_price', 'sales.quantity', 'sales.price')
                        ->leftJoin('products', 'sales.product_id', '=', 'products.id')
                        ->where('sales.updated_at', '>=', date('Y-m-d'). ' 00:00:00')
                        ->where('sales.updated_at', '<=', date('Y-m-d'). ' 23:59:59')
                        ->get();

        $total = DB::table('sales')->where('sales.updated_at', '>=', date('Y-m-d'). ' 00:00:00')
                                    ->where('sales.updated_at', '<=', date('Y-m-d'). ' 23:59:59')
                                    ->sum('price');

        return view('reports.daily', ['user' => $user,
                                   'daily' => $daily,
                                   'total' => $total
                                  ]);

    }
}
