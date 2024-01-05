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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('computer_id');
            $table->integer('monitor_id');
            $table->integer('accesoris_id');
            $table->string('proci');
            $table->string('memory');
            $table->integer('ram');
            $table->string('tambahan');
            $table->string('iplocal');
            $table->string('ipvpn');
            $table->string('tanggal_mulai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
