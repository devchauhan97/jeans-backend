<?php

namespace App\Listeners;

use App\Events\BlogNotificationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;
use Lang;
use App\AlertSetting;
use App\Setting;
use DB;
use App\Customer;

class BlogNotificationFired
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
     * @param  BlogNotificationMail  $event
     * @return void
     */
    public function handle(BlogNotificationMail $event)
    {
        $products_id = $event->products_id;

        $alertSetting = AlertSetting::get();
        $setting =  Setting::get();
        $app_name = $setting[18]->value;

        $product = DB::table('blogs')->leftJoin('blog_descriptions','blogs.blogs_id','=','blog_descriptions.blogs_id')->select('blogs.*', 'blog_descriptions')->get();
        
        $result['product'] = $product;  
        
        //email 
        if( $alertSetting[0]->new_product_email == 1){
            
            $customers = DB::table('customers')->get();
            
            $result['customers'] = $customers;
            
            foreach($customers as $customers_data) {

                $customers_data->product = $product;
                
                if( !empty($customers_data->email) ) {
                    /*Mail::send('/mail/news', ['customers_data' => $customers_data], function($m) use ($customers_data){
                        $m->to($customers_data->email)->subject($customers_data->news[0]->news_name)->getSwiftMessage()
                        ->getHeaders()
                        ->addTextHeader('x-mailgun-native-send', 'true');   
                    });*/
                }
                
            }
            
        }

    }
}
