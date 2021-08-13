<?php

namespace App\Jobs\CoinbaseWebhooks;

use App\Models\Orders;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Models\User;
use App\Models\ChMessage;
class HandleConfirmedCharge implements ShouldQueue
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

        // $model = $webhook['event']['data']['metadata']['model_name'];
        // $user = $webhook['event']['data']['metadata']['user_name'];
        // $modelid = User::where('name', $model)->first(); 
        // $userid = User::where('name', $user)->first(); 

        // $messageID = mt_rand(9, 999999999) + time();

        // $charge_code = $webhook['event']['data']['code'];
        // $order = Orders::where('payment_id', $charge_code)->update([
        //     'current_status' => 'PAYED'
        // ]);

        // ChMessage::create([
        //         'id' => $messageID,
        //         'type' => 'user',
        //         'from_id' => $userid->id,
        //         'to_id' => $modelid->id,
        //         'body' => 'test1241',
        //         'attachment' => null,
        //         'seen' => FALSE,
        //         "created_at" =>  \Carbon\Carbon::now(), 
        //         "updated_at" => \Carbon\Carbon::now(),
        // ]);
        ChMessage::create([
                'id' => 124124143,
                'type' => 'user',
                'from_id' => 2,
                'to_id' => 3,
                'body' => 'test1241',
                'attachment' => null,
                'seen' => FALSE,
                "created_at" =>  \Carbon\Carbon::now(), 
                "updated_at" => \Carbon\Carbon::now(),
        ]);
        
        // Orders::create([
        //     'payment_id' => $webhook['event']['data']['code'],
        //     'model_name' => $webhook['event']['data']['metadata']['model_name'],
        //     'user_name' => $webhook['event']['data']['metadata']['user_name'],
        //     'service_name' => $webhook['event']['data']['metadata']['service_name'],
        //     'info' => $webhook['event']['data']['metadata']['info'],
        //     'price' => $webhook['event']['data']['metadata']['price'],
        //     'current_status' =>  'NEW',
        // ]);
        // you can access the payload of the webhook call with `$this->webhookCall->payload`
    }
}