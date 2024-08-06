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
        Schema::create('hoa_don_chi_tiets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hoa_don_id')->constrained('hoa_dons')->onDelete('cascade'); 
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
        Schema::dropIfExists('hoa_don_chi_tiets');
    }
};
