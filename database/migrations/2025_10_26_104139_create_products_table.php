<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

return new class extends Migration
{
    public function up()
    {
        try {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->string('name');
                $table->text('description');
                $table->decimal('price', 10, 2);
                $table->string('image')->nullable();
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
                
                // Explicitly set engine to InnoDB
                $table->engine = 'InnoDB';
            });
        } catch (QueryException $e) {
            // If table already exists, continue
            if (!str_contains($e->getMessage(), "already exists")) {
                throw $e;
            }
        }
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};