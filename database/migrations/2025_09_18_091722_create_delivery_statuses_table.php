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
        Schema::create('delivery_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string("loc_title");
        });

        DB::table('delivery_statuses')->insert([
            ['title' => 'waiting', 'loc_title' => 'Ждёт отправки'],
            ['title' => 'transit', 'loc_title' => 'В пути'],
            ['title' => 'delivired', 'loc_title' => 'Доставлен'],
            ['title' => 'canceled', 'loc_title' => 'Отменён'],
            ['title' => 'lost', 'loc_title' => 'Потерян'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_statuses');
    }
};
