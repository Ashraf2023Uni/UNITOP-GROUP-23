<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderID');
            /**$table->foreign('userName')->references('userName')->on('signup');*/ 
            $table->foreignId('productID');
            $table->foreign('productID')->references('productID')->on('products');
            /**$table->foreign('deliveryID')->references('deliveryID')->on('delivery');*/
            $table->timestamp('order_date');
            $table->float('orderPrice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
