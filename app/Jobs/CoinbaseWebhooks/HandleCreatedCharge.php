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
        
        Orders::create([
            'payment_id' => $webhook['event']['data']['code'],
            'model_name' => $webhook['event']['data']['metadata']['model_name'],
            'user_name' => $webhook['event']['data']['metadata']['user_name'],
            'service_name' => $webhook['event']['data']['metadata']['service_name'],
            'info' => $webhook['event']['data']['metadata']['info'],
            'price' => $webhook['event']['data']['metadata']['price'],
            'current_status' =>  'NEW',
        ]);
        // you can access the payload of the webhook call with `$this->webhookCall->payload`
    }
}