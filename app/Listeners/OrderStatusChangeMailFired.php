<?php

namespace App\Listeners;

use App\Events\OrderStatusChangeMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Lang;
use App\AlertSetting;
use App\Setting;
use DB;
use App\Customer;
class OrderStatusChangeMailFired
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
     * @param  OrderStatusChangeMail  $event
     * @return void
     */
    public function handle(OrderStatusChangeMail $event)
    {
        $orders_id = $event->orders_id;
        $customers_id   = $event->customers_id;
        $status   = $event->status;

        $alertSetting = AlertSetting::get();
        $setting =  Setting::get();
        $app_name = $setting[18]->value;

        $title    = $app_name . Lang::get("labels.OrderStatusNotificationTitle");
        $message  =  Lang::get("labels.OrderStatusNotficationMessagePart1").' '.$orders_id.' '.Lang::get("labels.OrderStatusNotificationMessagePart2").' '.$status.'.';
                
        $devices = Customer::where('customers_id', $customers_id)->first();

        $temp['devices'] = $devices;
        $temp['message'] = $message;
        $temp['app_name'] = $app_name;
        //status change email 
        if( $alertSetting[0]->order_status_email == 1 and !empty($devices->email) ) { 
        
            Mail::send('/mail/orderStatus', ['data' => $temp], function($m) use ($devices,$app_name){
                $m->to($devices->email)->subject($app_name.Lang::get("labels.OrderStatusEmailTitle"))->getSwiftMessage()
                ->getHeaders()
                ->addTextHeader('x-mailgun-native-send', 'true');   
            });
        
        }
    }
}
