<?php

namespace App\Console\Commands;

use App\Mail\Reports;
use App\Models\Sale;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendDailyReportEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que dispara o envio do relatorio diario de venda para o chefe';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $daily = Sale::select('sales.id', 'sales.updated_at', 'products.name', 'products.sale_price', 'products.buy_price', 'sales.quantity', 'sales.price')
                        ->leftJoin('products', 'sales.product_id', '=', 'products.id')
                        ->where('sales.updated_at', '>=', date('Y-m-d'). ' 00:00:00')
                        ->where('sales.updated_at', '<=', date('Y-m-d'). ' 23:59:59')
                        ->get();

        $total = DB::table('sales')->where('sales.updated_at', '>=', date('Y-m-d'). ' 00:00:00')
                                   ->where('sales.updated_at', '<=', date('Y-m-d'). ' 23:59:59')
                                   ->sum('price');


        Mail::to('testetesteweb287@gmail.com')->send(new Reports($daily, $total));
    }
}
