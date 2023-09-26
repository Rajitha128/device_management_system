<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Organization extends Model
{
    protected $fillable = [
        'code',
        'name'
    ];

    /**
     * Gets the related locations.
     *
     * @return Location
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
