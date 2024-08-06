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
        Schema::create('chi_tiet_gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gio_hang_id')->constrained('gio_hangs')->onDelete('cascade'); 
            $table->foreignId('san_pham_id')->constrained('san_phams')->onDelete('cascade'); 
            $table->integer('so_luong'); 
            $table->decimal('gia', 10, 2); 

            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_gio_hangs');
    }
};
