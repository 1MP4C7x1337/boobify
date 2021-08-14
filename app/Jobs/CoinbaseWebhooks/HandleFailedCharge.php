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
use Illuminate\Support\Facades\DB;
use App\Models\ChMessage;

class HandleFailedCharge implements ShouldQueue
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

        $charge_code = $webhook['event']['data']['code'];

        Orders::where('payment_id', $charge_code)->update([
            'current_status' => 'FAILED'
        ]);

        // DB::table('ch_messages')->insert([
        //     'id' => $messageID,
        //     'type' => 'user',
        //     'from_id' => 2,
        //     'to_id' => 1,
        //     'body' => 'test1241',
        //     'attachment' => null,
        //     'seen' => FALSE

        // ]);

        
        // you can access the payload of the webhook call with `$this->webhookCall->payload`
    }
}