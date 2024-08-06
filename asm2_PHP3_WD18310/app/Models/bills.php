<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = ['user_id', 'address', 'phone', 'status'];
    public function items()
    {
        return $this->hasMany(BillItem::class, 'bill_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
