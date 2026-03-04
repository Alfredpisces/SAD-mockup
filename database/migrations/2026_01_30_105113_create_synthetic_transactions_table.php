<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void {
    Schema::create('synthetic_transactions', function (Blueprint $table) {
        $table->id();
        $table->string('archetype'); // Farmer, Mule, Student
        $table->string('sender_name');
        $table->string('receiver_name');
        $table->decimal('amount', 15, 2);
        $table->string('type'); // Cash-in, Transfer
        $table->boolean('is_fraud')->default(false);
        $table->string('fraud_pattern')->nullable();
        $table->timestamp('transaction_at');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('synthetic_transactions');
    }
};
