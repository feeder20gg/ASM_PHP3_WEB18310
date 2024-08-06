<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\danh_mucs;
use App\Models\khuyen_mais;


class san_phams extends Model
{
    use HasFactory;
    protected $table = 'san_phams';

    protected $fillable = [
        'ten_san_pham',
        'gia',
        'mo_ta',
        'danh_muc_id',
        'hinh_anh',
    ];

    public function danhMuc()
    {
        return $this->belongsTo(danh_mucs::class, 'danh_muc_id');
    }
    public function khuyenMais()
    {
        return $this->hasMany(khuyen_mais::class, 'san_pham_id');
    }
    public function billItems()
    {
        return $this->hasMany(BillItem::class, 'product_id');
    }
}
