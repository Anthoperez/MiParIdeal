<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'comprador_id',
        'product_id',
        'quantity',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function comprador()
    {
        return $this->belongsTo(User::class, 'comprador_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
