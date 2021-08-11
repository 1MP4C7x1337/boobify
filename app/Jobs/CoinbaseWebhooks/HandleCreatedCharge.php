<?php

namespace App\Jobs\CoinbaseWebhooks;

use App\Models\Orders;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;

class HandleCreatedCharge implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    /** @var \Shakurov\Coinbase\Models\CoinbaseWebhookCall */
    public $webhookCall;

    public function __construct(CoinbaseWebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    public function handle()
    {
        $webhook = $this->webhookCall->payload;
        
        Order::create([
            'payment_id' => $webhook['event']->id,
            'model_name' => $webhook['metadata']->model_name,
            'user_name' => $webhook['metadata']->user_name,
            'service_name' => $webhook['metadata']->service_name,
            'info' => $webhook['metadata']->info,
            'price' => $webhook['metadata']->price,
        ]);
        // you can access the payload of the webhook call with `$this->webhookCall->payload`
    }
}