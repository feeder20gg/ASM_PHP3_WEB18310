<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\san_phams;

class danh_mucs extends Model
{
    use HasFactory;
    protected $fillable = ['ten_danh_muc'];

    public function sanPhams()
    {
        return $this->hasMany(san_phams::class, 'danh_muc_id');
    }
}
