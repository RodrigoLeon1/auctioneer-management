<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_invoice',
        'partial_payment',
        'commission',
        'total',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        // return $this->belongsToMany('App\Models\Product');
        return $this->belongsToMany('App\Models\Product')
            ->withPivot('quantity', 'price_unit', 'total')
            ->withTimestamps();
    }
}
