<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->nullable();
            $table->string('model_name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('service_name')->nullable();
            $table->string('info')->nullable();
            $table->string('current_status')->nullable();
            $table->string('price')->nullable();
            $table->string('images_links')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
