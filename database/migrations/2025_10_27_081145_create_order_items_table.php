<?php

// database/migrations/2025_10_27_000002_create_order_items_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->bigInteger('unit_price');
            $table->bigInteger('total_price');
            $table->timestamps();

            $table->index('product_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};

