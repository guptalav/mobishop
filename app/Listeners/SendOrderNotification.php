<?php

namespace Mobishop\Listeners;

use Mail;
use Mobishop\Events\OrderConfirmed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderNotification implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderConfirmed  $event
     * @return void
     */
    public function handle(OrderConfirmed $event)
    {
        Mail::queue('emails.order', ['cart' => $event->cart], function ($m) use ($event) {
            $m->from('noreply@mobishop.dev', 'Mobishop');
            $m->to($event->email, $event->email)->subject('Thank you for your order.');
        });
    }
}
