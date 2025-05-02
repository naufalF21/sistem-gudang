<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goods extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'goods';

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'location',
        'description',
        'status',
        'min_stock',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function mutations()
    {
        return $this->hasMany(Mutation::class, 'goods_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'goods_id');
    }
}
