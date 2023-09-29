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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('cate_id'); 
            $table->foreign('cate_id')->references('id')->on('categories');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->json('inclusions')->nullable();
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->unsignedBigInteger('created_by'); 
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
