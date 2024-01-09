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
        Schema::create('tb_notif', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('descriptions')->nullable();
            $table->timestamps();
        });
    }

    /**i
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_notif');
    }
};
