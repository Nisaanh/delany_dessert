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
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
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
        Schema::dropIfExists('categories');
    }
};