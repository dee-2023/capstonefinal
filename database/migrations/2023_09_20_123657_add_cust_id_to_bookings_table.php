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
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('cust_id'); 
            $table->foreign('cust_id')->references('id')->on('users'); // Define the foreign key constraint
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['cust_id']); // Remove the foreign key constraint
            $table->dropColumn('cust_id'); // Remove the 'user_id' column
        
        });
    }
};
