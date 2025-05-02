<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'stocks';

    protected $fillable = [
        'goods_id',
        'quantity',
    ];

    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }
}
