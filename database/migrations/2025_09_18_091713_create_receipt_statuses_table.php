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
        Schema::create('receipt_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string("loc_title");
        });

        DB::table('receipt_statuses')->insert([
            ['title' => 'not_received', 'loc_title' => 'Не получен'],
            ['title' => 'received', 'loc_title' => 'Получен']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_statuses');
    }
};
