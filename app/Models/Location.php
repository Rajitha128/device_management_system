<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'serial_number',
        'name',
        'ipv4_address',
        'organization_id'
    ];

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
