<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'disaster_id',
        'user_id',
        'distribution_code',
        'distributed_at',
        'status',
        'notes',
    ];

    protected $casts = [
        'distributed_at' => 'datetime',
    ];

    public function disaster()
    {
        return $this->belongsTo(Disaster::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(DistributionItem::class);
    }

    public function photos()
    {
        return $this->hasMany(DistributionPhoto::class);
    }

    public function stockMovements()
    {
        return $this->morphMany(StockMovement::class, 'reference');
    }
}
