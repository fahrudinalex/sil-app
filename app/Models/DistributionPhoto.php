<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'distribution_id',
        'photo_path',
        'caption',
    ];

    public function distribution()
    {
        return $this->belongsTo(Distribution::class);
    }
}
