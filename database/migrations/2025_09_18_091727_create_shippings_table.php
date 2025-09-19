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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('vehicle_id')
                ->nullable()
                ->constrained('vehicles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('sender_address_id')
                ->constrained('addresses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('delivery_address_id')
                ->constrained('addresses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('receipt_status_id')
                ->constrained('receipt_statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('delivery_status_id')
                ->constrained('delivery_statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
