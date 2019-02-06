<?php

namespace App\Listeners;

use App\Events\ProductNotificationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Lang;
use App\AlertSetting;
use App\Setting;
use DB;
use App\Customer;

class ProductNotificationMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductNotificationMail  $event
     * @return void
     */
    public function handle(ProductNotificationMail $event)
    {
        $products_id = $event->products_id;

        $alertSetting = AlertSetting::get();
        $setting =  Setting::get();
        $app_name = $setting[18]->value;

        $product = DB::table('products_to_categories')
            ->leftJoin('categories', 'categories.categories_id', '=', 'products_to_categories.categories_id')
            ->leftJoin('categories_description', 'categories_description.categories_id', '=', 'products_to_categories.categories_id')
            ->leftJoin('products', 'products.products_id', '=', 'products_to_categories.products_id')
            ->leftJoin('products_description','products_description.products_id','=','products.products_id')
            ->LeftJoin('manufacturers', function ($join) {
                $join->on('manufacturers.manufacturers_id', '=', 'products.manufacturers_id');
             })
            ->LeftJoin('specials', function ($join) {
                $join->on('specials.products_id', '=', 'products.products_id')->where('status', '=', '1');
             })
             
            ->select('products_to_categories.*', 'categories_description.categories_name','categories.*', 'products.*','products_description.*', 'specials.specials_id', 'manufacturers.*', 'specials.products_id as special_products_id', 'specials.specials_new_products_price as specials_products_price', 'specials.specials_date_added as specials_date_added', 'specials.specials_last_modified as specials_last_modified', 'specials.expires_date')
            ->where('products_description.language_id','=', 1)
            ->where('products.products_id','=', $products_id)
            ->where('categories_description.language_id','=', 1)->get();
        
        $result['product'] = $product;  
        
        //email 
        if( $alertSetting[0]->new_product_email == 1){
            
            $customers = DB::table('customers')->get();
            
            $result['customers'] = $customers;
            
            foreach($customers as $customers_data) {

                $customers_data->product = $product;
                if( !empty($customers_data->email) ) {
                    Mail::send('/mail/newProduct', ['customers_data' => $customers_data], function($m) use ($customers_data){
                        $m->to($customers_data->email)->subject(Lang::get("labels.NewProductEmailTitle"))->getSwiftMessage()
                        ->getHeaders()
                        ->addTextHeader('x-mailgun-native-send', 'true');   
                    });
                }
                
            }
            
        }
        
    }
}
