<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'number',
        'type',
        'image',
        'status',
        'location_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
