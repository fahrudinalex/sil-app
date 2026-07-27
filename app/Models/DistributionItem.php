<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'distribution_id',
        'item_variant_id',
        'quantity',
    ];

    public function distribution()
    {
        return $this->belongsTo(Distribution::class);
    }

    public function itemVariant()
    {
        return $this->belongsTo(ItemVariant::class);
    }
}
