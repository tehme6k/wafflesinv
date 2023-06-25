<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    'product_id',
    'created_by',
    'labels_per_roll',
    'number_of_rolls',
    'total_labels',
    'total_cost',
    'reason',
    'description',
    'reason_id'
];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function reason(): BelongsTo
    {
        return $this->belongsTo(Reason::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
