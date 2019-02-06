<?php

namespace App\Listeners;

use App\Events\ContactUsMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMailFired
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
     * @param  ContactUsMail  $event
     * @return void
     */
    public function handle(ContactUsMail $event)
    {
        //
    }
}
