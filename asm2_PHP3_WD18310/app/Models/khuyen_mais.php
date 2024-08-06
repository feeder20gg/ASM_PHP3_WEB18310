<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\san_phams;
class khuyen_mais extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_khuyen_mai',
        'san_pham_id',
        'gia_tri',
    ];

    public function sanPham()
    {
        return $this->belongsTo(san_phams::class, 'san_pham_id');
    }
}
