<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Production extends Model
{

    protected $fillable = ['product_id' ,'created_by' ,'amount_issued', 'amount_needed', ];
    use HasFactory, SoftDeletes;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
