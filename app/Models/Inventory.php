<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'labels_per_roll', 'number_of_rolls', 'total_labels', 'total_cost'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
