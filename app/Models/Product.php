<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'taller_id',
    ];

    public function taller()
    {
        return $this->belongsTo(User::class, 'taller_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}