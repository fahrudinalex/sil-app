<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'location_name',
        'address',
        'latitude',
        'longitude',
        'occurred_at',
        'description',
        'status',
    ];

    protected $casts = [
        'occurred_at' => 'date',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }
}
