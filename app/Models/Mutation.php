<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mutation extends Model
{
    /** @use HasFactory<\Database\Factories\MutationFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'mutations';

    protected $fillable = [
        'goods_id',
        'user_id',
        'date',
        'type',
        'quantity',
    ];

    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
