<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\san_phams;
class BillItem extends Model
{
    use HasFactory;

    protected $fillable = ['bill_id', 'product_id', 'quantity'];

    public function bill()
    {
        return $this->belongsTo(Bills::class, 'bill_id');
    }
    

    public function product()
    {
        return $this->belongsTo(san_phams::class, 'product_id');
    }
}
