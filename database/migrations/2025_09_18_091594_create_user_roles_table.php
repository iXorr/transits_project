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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("loc_title");
        });

        DB::table('user_roles')->insert([
            ['title' => 'client', 'loc_title' => 'Клиент'],
            ['title' => 'driver', 'loc_title' => 'Водитель']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
