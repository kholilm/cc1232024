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
        Schema::create('tb_sop', function (Blueprint $table) {
            $table->id();
            $table->string('menu')->nullable();
            $table->string('url')->nullable();
            $table->string('controller')->nullable();
            $table->string('menu_id')->nullable();
            $table->string('jenis_menu')->nullable();
            $table->string('icon')->nullable();
            $table->string('path_pdf')->nullable();
            $table->integer('sort_menu')->nullable();
            $table->integer('is_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sop');
    }
};
