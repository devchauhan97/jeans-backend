<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use session;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct()
    {
    	$result = array();
        $orders = DB::table('orders')
                ->leftJoin('customers','customers.customers_id','=','orders.customers_id')
                ->where('orders.is_seen','=', 0)
                ->orderBy('orders_id','desc')
                ->get();
                
        $index = 0; 
        foreach($orders as $orders_data){
            
            array_push($result,$orders_data);           
            $orders_products = DB::table('orders_products')
                ->where('orders_id', '=' ,$orders_data->orders_id)
                ->get();
            
            $result[$index]->price = $orders_products;
            $result[$index]->total_products = count($orders_products);
            $index++;
        }
        
        //new customers
        $newCustomers = DB::table('customers')
                ->where('is_seen','=', 0)
                ->orderBy('customers_id','desc')
                ->get();
                
        //products low in quantity
        $lowInQunatity = DB::table('products')
            ->LeftJoin('products_description', 'products_description.products_id', '=', 'products.products_id')
            ->whereColumn('products.products_quantity', '<=', 'products.low_limit')
            ->where('products_description.language_id', '=', '1')
            ->where('products.low_limit', '>', 0)
            //->get();
            ->paginate(10);
        
        $languages = DB::table('languages')->get();
        view()->share('languages', $languages);
        
        $web_setting = DB::table('settings')->get();
        view()->share('web_setting', $web_setting);

        view()->share('unseenOrders', $result);
        view()->share('newCustomers', $newCustomers);
        view()->share('lowInQunatity', $lowInQunatity);
    }
}
